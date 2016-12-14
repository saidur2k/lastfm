<?php

use App\Api\Config;

class ConfigTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function given_config_file_check_if_the_parameters_match()
    {
        $testConfigFile = 'tests/Api/mock.env.file';
        $loadTestConfig = new Config($testConfigFile);
        $this->assertEquals('YOUR_API_KEY', $loadTestConfig->getApiKey());
        $this->assertEquals('YOUR_SECRET_KEY', $loadTestConfig->getSecretKey());
        $this->assertEquals('5', $loadTestConfig->getResultsPerPage());
        $this->assertEquals('http://ws.audioscrobbler.com/2.0/', $loadTestConfig->getBaseUrl());
    }
}
