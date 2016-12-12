<?php
namespace App;

/**
 * Class LastFmConfig
 * @package App
 * Contains the LastFM Configuration loaded from config.env
 */
class LastFmConfig
{
    /**
     * @var string $apiKey Contains API Key for LastFM
     */
    private $apiKey;
    /**
     * @var string $secret Contains Secret Key for LastFM
     */
    private $secret;

    public function __construct()
    {
        $config = parse_ini_file('config.env');
        $this->apiKey = $config['APIKEY'];
        $this->secret = $config['SECRET'];
    }

    /**
     * @return string API Key for LastFM
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * @return string Secret Key for LastFM
     */
    public function getSecret()
    {
        return $this->secret;
    }

}