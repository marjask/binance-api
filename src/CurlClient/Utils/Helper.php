<?php

declare(strict_types=1);

namespace CurlClient\Utils;

final class Helper
{
    public static function getPreparedQueryUrl(array $params): string
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

    public static function getHeadersFromCurlResponse(string $header): array
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
}
