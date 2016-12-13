<?php

namespace App\Api;

/**
 * Class MethodAbstractClass
 * @package App\Api
 * Abstract class for the API Methods as outlined in the Specs.
 */
abstract class MethodAbstractClass
{
    /**
     * @var string Input or Selection made by the end user
     */
    protected $selection;
    /**
     * @var integer Track the current page number
     */
    protected $page;

    public function __construct($selection, $page)
    {
        $this->selection = $selection;
        $this->page = $page;
    }

    /**
     * @return string
     */
    abstract protected function methodName();
}