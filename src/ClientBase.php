<?php

namespace Datastore;

abstract class ClientBase
{
    public $client;

    public function __construct($baseUrl, $token)
    {
        $headers = [
            "Content-Type" => "application/json",
            "Accept" => "application/json",
            "Api-Key" => $token,
        ];
        $this->client = new \GuzzleHttp\Client([
            "base_uri" => $baseUrl,
            "headers" => $headers,
            "timeout" => Settings::TIMEOUT_SEC
        ]);
    }

    protected function get($url, $query = [])
    {
        $response = $this->client->get($url, ["query" => $query]);
        return json_decode($response->getBody(), true);
    }

    protected function post($url, $data)
    {
        $response = $this->client->post($url, [
            "json" => $data
        ]);
        return json_decode($response->getBody(), true);
    }
}
