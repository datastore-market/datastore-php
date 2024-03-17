<?php

namespace Datastore;

class SuggestionsClient extends ClientBase
{
    const BASE_URL = "https://api.datastore.market/suggestions";

    public function __construct($token)
    {
        parent::__construct(self::BASE_URL, $token);
    }

    public function suggestions($name, $query, $count = Settings::SUGGESTION_COUNT, $kwargs = [])
    {
        $url = "suggestions/$name";
        $data = ["query" => $query, "count" => $count];
        $data = $data + $kwargs;
        $response = $this->post($url, $data);
        return $response["suggestions"];
    }
}
