<?php

namespace App\Api;

use App\Api\Config;
use App\Api\MethodAbstractClass;
use App\Util\Stringify;
use App\Util\HttpRequest;

class Request
{
    private $config;
    private $method;

    public function __construct(Config $config, MethodAbstractClass $method)
    {
        $this->config = $config;
        $this->method = $method;
    }

    protected function getFullUrl()
    {
        return    $this->config->getBaseUrl()
                . "?" . Stringify::parameters($this->method->parameters())
                . "&limit=" . $this->config->getResultsPerPage()
                . "&api_key=" . $this->config->getApiKey()
                . "&format=json";
    }

    public function get()
    {
        $result = HttpRequest::get($this->getFullUrl());
        var_dump($result);
        return true;
    }
}