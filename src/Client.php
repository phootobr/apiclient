<?php

namespace PhootoBR\APIClient;

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Client as HttpClient;

class Client
{
    private $clientId;
    private $clientSecret;
    private $service;
    private $config;
    private $httpClient;
    private $baseUri;

    public function __construct($clientId, $clientSecret, $service)
    {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->service = $service;
        $this->httpClient = new HttpClient();

        $this->config = new Config('services');
        $this->baseUri = $this->config->getValue($service);
    }

    public function __call($method, $args)
    {
        try {
            $response = $this->execRequest(strtoupper($method), $this->baseUri . $args[0], $args[1]);
            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            return [
                "error" => $e->getCode(),
                "message" => $e->getMessage(),
            ];
        }
    }

    private function execRequest($method, $uri, $data)
    {
        $token = $this->getAccessToken();
        $options = [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token
            ],
        ];
        switch ($method) {
            case 'POST':
                $options['json'] = $data;
                break;
            case 'GET':
                $options['query'] = $data;
                break;
            case 'PUT':
                $options['json'] = $data;
                break;
        }

        return $this->httpClient->request($method, $uri, $options);
    }

    private function getAccessToken()
    {
        $response = $this->httpClient->request(
            'POST',
            $this->config->getValue('auth') . 'oauth/token',
            [
                'json' => [
                    'grant_type' => 'client_credentials',
                    'client_id' => $this->clientId,
                    'client_secret' => $this->clientSecret,
                ]
            ]
        );
        if($response->getStatusCode() === 200) {
            $body = json_decode($response->getBody());
            return $body->access_token;
        } else {
            throw new \Exception('InvalidToken');
        }
    }
}
