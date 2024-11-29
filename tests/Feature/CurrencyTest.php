<?php

namespace Tests\Feature;

use App\Models\Currency;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CurrencyTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_from_api_data_creates_currency_instance()
    {
        // Example JSON API data
        $apiData = [
            "table" => "C",
            "currency" => "dolar amerykański",
            "code" => "USD",
            "rates" => [
                [
                    "no" => "010/C/NBP/2022",
                    "effectiveDate" => "2022-01-17",
                    "bid" => 3.9282,
                    "ask" => 4.0076
                ]
            ]
        ];

        // Call the fromApiData method
        $currency = Currency::fromApiData($apiData);

        // Check if the Currency model has been correctly populated
        $this->assertInstanceOf(Currency::class, $currency);
        $this->assertEquals("dolar amerykański", $currency->name);
        $this->assertEquals("USD", $currency->code);
        $this->assertEquals("4.0076", $currency->ask);  // Assert ask is a string
        $this->assertEquals("3.9282", $currency->bid);  // Assert bid is a string
    }
}
