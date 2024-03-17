<?php

namespace Datastore;

use GuzzleHttp\Client;

final class SuggestionsTest extends BaseTest
{
    protected function setUp()
    {
        parent::setUp();
        $this->api = new SuggestionsClient("token");
        $this->api->client = new Client(["handler" => $this->handler]);
    }

    public function testToken()
    {
        $api = new SuggestionsClient("123");
        $headers = $api->client->getConfig("headers");
        $this->assertEquals($headers["Authorization"], "Token 123");
    }

    public function testSuggestions()
    {
        $expected = [
            ["value" => "г Москва, ул Сухонская", "data" => ["kladr_id" => "77000000000283600"]],
            ["value" => "г Москва, ул Сухонская, д 1", "data" => ["kladr_id" => "7700000000028360009"]]
        ];
        $response = [
            "suggestions" => $expected
        ];
        $this->mockResponse($response);
        $actual = $this->api->suggestions("address", "мск сухонская");
        $this->assertEquals($actual, $expected);
    }

    public function testSuggestionsRequest()
    {
        $this->mockResponse([ "suggestions" => [] ]);
        $kwargs = [
            "to_bound" => ["value" => "city"]
        ];
        $this->api->suggestions("address", "samara", 10, $kwargs);
        $expected = ["query" => "samara", "count" => 10, "to_bound" => ["value" => "city"]];
        $actual = $this->getLastRequest();
        $this->assertEquals($expected, $actual);
    }

    public function testSuggestionsNotFound()
    {
        $expected = [];
        $response = [
            "suggestions" => $expected
        ];
        $this->mockResponse($response);
        $actual = $this->api->suggestions("address", "whatever");
        $this->assertEquals($actual, $expected);
    }
}
