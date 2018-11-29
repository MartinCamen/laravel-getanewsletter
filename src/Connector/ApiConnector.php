<?php

namespace MartinCamen\GetANewsletter\Connector;

use GuzzleHttp\Client;

class ApiConnector
{
    protected $client;
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = 'https://api.getanewsletter.com/v3/';

        $this->client = new Client([
            'headers' => [
                'Authorization' => 'Token ' . config('getanewsletter.token'),
            ],
        ]);
    }

    public function call(string $method, string $endpoint, array $data = [])
    {
        $url = $this->baseUrl . $endpoint;
        if (! ends_with($url, '/')) {
            $url .= '/';
        }

        return json_decode(
            $this->client
                ->request($method, $url, [
                    'json' => $data,
                ])
                ->getBody()
                ->getContents()
        );
    }

    public function callWithOptionalReturn(string $method, string $endpoint, array $data = [], bool $asCollection = true)
    {
        $response = $this->call($method, $endpoint, $data);
        if (! $asCollection) {
            return $response;
        }

        return collect($response->results);
    }

    /**
     * @param string $endpoint
     * @param bool $asCollection
     * @return mixed
     */
    public function getSingleWithOptionalReturn(string $endpoint, bool $asCollection = true)
    {
        $response = $this->call('get', $endpoint);
        if (! $asCollection) {
            return $response;
        }

        return collect($response);
    }
}
