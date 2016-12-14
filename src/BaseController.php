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

    abstract public function makeRequestBy($selection, $page);

    protected function handle(MethodContract $method)
    {
        return new Request($this->config, $method);
    }

    abstract protected function sanitizeArray($data);


    public function toJSON($data)
    {
        echo json_encode($data);
    }
}