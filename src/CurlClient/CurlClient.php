<?php

declare(strict_types=1);

namespace CurlClient;

use Binance\ApiConst;
use Binance\ValueObject\BinanceApiAccountKey;
use CurlClient\Exception\ResponseErrorException;
use CurlClient\Query\Request;
use CurlClient\Request\RequestDetails;
use CurlClient\Response\Response;
use CurlClient\Response\ResponseFactory;
use CurlClient\Utils\Helper;
use DateTime;
use RuntimeException;

final class CurlClient
{
    private string $url;
    private bool $debug = false;
    private int $timeout;
    private ?BinanceApiAccountKey $binanceApiAccountKey = null;
    private ?RequestDetails $lastRequestDetails = null;

    public function __construct(array $config)
    {
        $this->setConfig($config);
    }

    public function getLastRequestDetails(): ?RequestDetails
    {
        return $this->lastRequestDetails;
    }

    public function setBinanceApiAccountKey(BinanceApiAccountKey $binanceApiAccountKey): self
    {
        $this->binanceApiAccountKey = $binanceApiAccountKey;

        return $this;
    }

    public function setConfig(array $config): void
    {
        if (!array_key_exists('url', $config)) {
            throw new RuntimeException('Empty url!');
        }

        $this->url = $config['url'];
        $this->debug = $config['debug'] ?? false;
        $this->timeout = $config['timeout'] ?? 60;
    }

    public function request(Request $request): Response
    {
        if ($request->isSignature() && !$this->binanceApiAccountKey instanceof BinanceApiAccountKey) {
            throw new RuntimeException('Signature required, configuration Binance Api needed!');
        }

        $startTime = microtime(true);
        $this->lastRequestDetails = new RequestDetails();

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_VERBOSE, $this->debug);

        if ($request->isSignature()) {
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'X-MBX-APIKEY: ' . $this->binanceApiAccountKey->getApiKey(),
            ));
        }

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
        $this->lastRequestDetails
            ->setQuery($query)
            ->setParameters($parameters);
        $signature = $request->isSignature()
            ? hash_hmac(ApiConst::ALGORITHM, $query, $this->binanceApiAccountKey->getSecretKey())
            : null;

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

        $this->lastRequestDetails
            ->setDebug($this->debug)
            ->setTimeout($this->timeout)
            ->setMethod($request->getMethod())
            ->setPath($this->url . $request->getPath())
            ->setResponse(curl_errno($curl) === 0 ? $output : CurlClientConst::EMPTY_RESPONSE)
            ->setDateTime(new DateTime())
            ->setError(curl_errno($curl) > 0 ? curl_error($curl) : null)
            ->setResponseCode($responseCode)
            ->setApiKey($request->isSignature() ? $this->binanceApiAccountKey->getApiKey() : null)
            ->setRequestTime(
                $this->getRequestTime($startTime)
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
