<?php

namespace Datastore;

use DateTime;

class AccountClient extends ClientBase
{
    const BASE_URL = "https://api.datastore.market/account";

    public function __construct($token)
    {
        parent::__construct(self::BASE_URL, $token);
    }

    public function getBalance()
    {
        $url = "account/balance";
        $response = $this->get($url);
        return $response["balance"];
    }

    public function getStats($date = null)
    {
        $url = "account/stats";
        if (!$date) {
            $date = new DateTime();
        }
        $query = ["date" => $date->format("Y-m-d")];
        $response = $this->get($url, $query);
        return $response;
    }

    public function getVersions()
    {
        $url = "account/versions";
        $response = $this->get($url);
        return $response;
    }
}
