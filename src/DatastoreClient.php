<?php

namespace Datastore;

class DatastoreClient
{
    private $account;
    private $suggestions;

    public function __construct($token)
    {
        $this->account = new AccountClient($token);
        $this->suggestions = new SuggestionsClient($token);
    }

    public function getBalance()
    {
        return $this->account->getBalance();
    }

    public function getStats($date = null)
    {
        return $this->account->getStats($date);
    }

    public function getVersions()
    {
        return $this->account->getVersions();
    }

    public function suggestions($name, $query, $count = Settings::SUGGESTION_COUNT, $kwargs = [])
    {
        return $this->suggestions->suggestions($name, $query, $count, $kwargs);
    }
}
