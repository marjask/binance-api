<?php

declare(strict_types=1);

namespace CurlClient;

use Binance\ApiConst;
use CurlClient\Query\Request;
use CurlClient\Response\AbstractResponse;
use CurlClient\Response\CreateOrderResponse;
use RuntimeException;

final class CurlClient
{
    private string $url;
    private bool $debug = false; // /< If you enable this, curl will output debugging information
    private string $apiKey;
    private string $apiSecret;
    private int $timeout;

    public function __construct(array $config)
    {
        if (!empty($config)) {
            $this->setConfig($config);
        }
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

    public function request(Request $request): array
    {
        $this->throwIfEmptyApiKeyOrApiSecret();

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
        $query = $this->getPreparedQueryUrl($parameters);
        $signature = hash_hmac(ApiConst::ALGORITHM, $query, $this->apiSecret);

        if ($request->getMethod() === CurlClientConst::POST) {
            $endpoint = $this->url . $request->getPath();
            $parameters['signature'] = $signature;
            $query = $this->getPreparedQueryUrl($parameters);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $query);
        } else {
            $endpoint = $this->url . $request->getPath() . '?' . $query . '&signature=' . $signature;
        }

        curl_setopt($curl, CURLOPT_URL, $endpoint);

        $output = curl_exec($curl);

        if (curl_errno($curl) > 0) {
            // should always output error, not only on httpdebug
            // not outputing errors, hides it from users and ends up with tickets on github
            throw new RuntimeException('Curl error: ' . curl_error($curl));
        }

        $headerSize = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
        $header = $this->getHeadersFromCurlResponse($output);
        $output = substr($output, $headerSize);

        curl_close($curl);

        $json = json_decode($output, true);

        return [$header, $json];
    }

    private function getPreparedQueryUrl(array $params): string
    {
        $parameters = [];
        $queryAdd = '';

        foreach ($params as $label => $item) {
            if (gettype($item) == 'array') {
                foreach ($item as $arrayItem) {
                    $queryAdd = $label . '=' . $arrayItem . '&' . $queryAdd;
                }
            } else {
                $parameters[$label] = $item;
            }
        }

        $query = http_build_query($parameters, '', '&');
        $query = $queryAdd . $query;

        //if send data type "e-mail" then binance return: [Signature for this request is not valid.]
        return str_replace(['%40'], ['@'], $query);
    }

    private function getHeadersFromCurlResponse(string $header): array
    {
        $headers = [];
        $headerText = substr($header, 0, strpos($header, "\r\n\r\n"));

        foreach (explode("\r\n", $headerText) as $i => $line)
            if ($i === 0)
                $headers['http_code'] = $line;
            else {
                [$key, $value] = explode(': ', $line);
                $headers[$key] = $value;
            }

        return $headers;
    }

    private function throwIfEmptyApiKeyOrApiSecret(): void
    {
        if (empty($this->apiKey)) {
            throw new RuntimeException('Api Key not exists!');
        }

        if (empty($this->apiSecret)) {
            throw new RuntimeException('Api Secret not exists!');
        }
    }
}
