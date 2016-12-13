<?php

namespace App\Api;


interface MethodContract
{
    /**
     * @return array
     */
    public function parameters();
}