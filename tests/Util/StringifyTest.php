<?php

use App\Util\Stringify;

class StringifyTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function test_array_of_three_string_parameters()
    {
        $params = [
            'country' => 'Australia',
            'limit' => '5',
            'page' => '1'
        ];

        $this->assertEquals('&country=Australia&limit=5&page=1', Stringify::parameters($params)) ;
    }

    /** @test */
    public function test_array_of_one_string_one_numeric_parameters()
    {
        $params = [
            'country' => 'Hong Kong',
            'limit' => 5
        ];

        $this->assertEquals('&country=Hong Kong&limit=5', Stringify::parameters($params)) ;
    }
}