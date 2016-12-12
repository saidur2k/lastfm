<?php
namespace App\Api;

/**
 * Class LastFmConfig
 * @package App
 * Contains the LastFM Configuration loaded from config.env
 */
class Config
{
    /**
     * @var string $apiKey Contains API Key for LastFM
     */
    private $apiKey;
    /**
     * @var string $secret Contains Secret Key for LastFM
     */
    private $secret;

    /**
     * @var string $resultPerPage Number of results per page
     */
    private $resultsPerPage;

    /**
     * @var string $baseUrl Base URL for Api
     */
    private $baseUrl;

    public function __construct()
    {
        $config = parse_ini_file('config.env');
        $this->apiKey = $config['APIKEY'];
        $this->secret = $config['SECRET'];
        $this->resultsPerPage = $config['RESULTS_PER_PAGE'];
        $this->baseUrl = $config['BASE_URL'];
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
    public function getSecretKey()
    {
        return $this->secret;
    }

    /**
     * @return string Returns the number of results to show per page
     */
    public function getResultsPerPage()
    {
        return $this->resultsPerPage;
    }

    /**
     * @return string Base URL for Api
     */
    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

}