<?php
use App\CountryNames;

class CountryNamesTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function test_fetch_country_by_name()
    {
        $countryName = (new CountryNames())->getCountryByName('bangladesh');
        $this->assertEquals('Bangladesh', $countryName);

        $countryName2 = (new CountryNames())->getCountryByName('Hong Kong');
        $this->assertEquals('Hong Kong', $countryName2);

        $countryName3 = (new CountryNames())->getCountryByName('united');
        $this->assertEquals('Tanzania, United Republic of', $countryName3);
    }

    /**
     * @expectedException Exception
     */
    public function test_invalid_country_name()
    {
        $invalidCountryName = (new CountryNames())->getCountryByName('invalidCountryName');
    }

    /** @test */
    public function test_fetch_country_by_code()
    {
        $countryCode = (new CountryNames())->getCountryByCode('BD');
        $this->assertEquals('Bangladesh', $countryCode);

        $countryCode2 = (new CountryNames())->getCountryByCode('au');
        $this->assertEquals('Australia', $countryCode2);

        $countryCode3 = (new CountryNames())->getCountryByCode('TZ');
        $this->assertEquals('Tanzania, United Republic of', $countryCode3);
    }

    /**
     * @expectedException Exception
     */
    public function test_invalid_country_code()
    {
        $invalidCountryName = (new CountryNames())->getCountryByCode('invalidCountryCode');
    }

}