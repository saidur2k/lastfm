<?php
// Tell PHP that we're using UTF-8 strings until the end of the script
mb_internal_encoding('UTF-8');

// Tell PHP that we'll be outputting UTF-8 to the browser
mb_http_output('UTF-8');

require('vendor/autoload.php');

//use App\LastFmConfig;

use App\CountryNames;
//(new LastFmConfig())->getApiKey();
var_dump((new CountryNames())->getCountryByName('bangladesh'));
