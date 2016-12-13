<?php

namespace App;

use App\Api\Config;
use App\Api\MethodContract;
use App\Api\Request;

abstract class BaseController
{
    protected $config;
    protected $selection;
    protected $page;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    abstract protected function makeRequestBy($selection, $page);

    protected function handle(MethodContract $method)
    {
        return new Request($this->config, $method);
    }

    public function getJsonFor($selection, $page)
    {
        echo json_encode($this->handle($this->makeRequestBy($selection, $page))->getJSON());
    }
}