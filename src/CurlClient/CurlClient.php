<?php

declare(strict_types=1);

namespace CurlClient;

use Binance\ApiConst;
use CurlClient\Exception\ResponseErrorException;
use CurlClient\Query\Request;
use CurlClient\RequestLogger\Command\CreateRequestLogCommand;
use CurlClient\RequestLogger\Logger;
use CurlClient\Response\Response;
use CurlClient\Response\ResponseFactory;
use CurlClient\Utils\Helper;
use DateTime;
use RuntimeException;

final class CurlClient
{
    private string $url;
    private bool $debug = false; // /< If you enable this, curl will output debugging information
    private string $apiKey;
    private string $apiSecret;
    private int $timeout;
    private Logger $logger;

    public function __construct(array $config, Logger $logger)
    {
        $this->setConfig($config);
        $this->logger = $logger;
    }

    public function setConfig(array $config): void
    {
        if (!array_key_exists('url', $config)) {
            throw new RuntimeException('Empty url!');
        }

        if (!array_key_exists('apiKey', $config)) {
            throw new RuntimeException('Api Key not exists!');
        }

        if (!array_key_exists('apiSecret', $config)) {
            throw new RuntimeException('Api Secret not exists!');
        }

        $this->url = $config['url'];
        $this->debug = $config['debug'] ?? false;
        $this->apiKey = $config['apiKey'];
        $this->apiSecret = $config['apiSecret'];
        $this->timeout = $config['timeout'] ?? 60;
    }

    public function request(Request $request): Response
    {
        $startTime = microtime(true);
        $logCommand = new CreateRequestLogCommand();

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_VERBOSE, $this->debug);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'X-MBX-APIKEY: ' . $this->apiKey,
        ));
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_HEADER, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, $this->timeout);
        curl_setopt($curl, CURLOPT_USERAGENT, 'User-Agent: Mozilla/4.0 (compatible; PHP Binance API)');

        if ($request->getMethod() === CurlClientConst::PUT) {
            curl_setopt($curl, CURLOPT_PUT, true);
        }

        if ($request->getMethod() === CurlClientConst::DELETE) {
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, CurlClientConst::DELETE);
        }

        $parameters = $request->getParams();
        $query = Helper::getPreparedQueryUrl($parameters);
        $logCommand
            ->setQuery($query)
            ->setParameters($parameters);
        $signature = hash_hmac(ApiConst::ALGORITHM, $query, $this->apiSecret);

        if ($request->getMethod() === CurlClientConst::POST) {
            $endpoint = $this->url . $request->getPath();

            if ($request->isSignature()) {
                $parameters['signature'] = $signature;
                $query = Helper::getPreparedQueryUrl($parameters);
            }

            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $query);
        } else {
            $endpoint = $this->url . $request->getPath() . '?' . $query;
            $endpoint .= $request->isSignature() ? '&signature=' . $signature : '';
        }

        curl_setopt($curl, CURLOPT_URL, $endpoint);

        $output = curl_exec($curl);
        $responseCode = (int) curl_getinfo($curl, CURLINFO_RESPONSE_CODE);

        $this->logger->logRequest(
            $logCommand
                ->setDebug($this->debug)
                ->setTimeout($this->timeout)
                ->setMethod($request->getMethod())
                ->setPath($request->getPath())
                ->setResponse($output)
                ->setDateTime(
                    new DateTime()
                )
                ->setError(
                    curl_errno($curl) > 0 ? curl_error($curl) : null
                )
                ->setResponseCode($responseCode)
                ->setRequestTime(
                    $this->getRequestTime($startTime)
                )
        );

        if (curl_errno($curl) > 0) {
            throw new RuntimeException('Curl error: ' . curl_error($curl));
        }

        $headerSize = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
        $headers = Helper::getHeadersFromCurlResponse($output);
        $output = substr($output, $headerSize);

        curl_close($curl);

        $data = json_decode($output, true);

        if ($responseCode > CurlClientConst::HTTP_204) {
            throw new ResponseErrorException(
                ResponseFactory::createResponseError($headers, $data)
            );
        }

        return ResponseFactory::create($headers, $data);
    }

    private function getRequestTime(float $start): float
    {
        return round(microtime(true) - $start, 2);
    }
}
