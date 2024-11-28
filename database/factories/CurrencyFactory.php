<?php

namespace Database\Factories;

use App\Models\Currency;
use Illuminate\Database\Eloquent\Factories\Factory;

class CurrencyFactory extends Factory
{
    protected $model = Currency::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $currencies = [
            [
                "name" => "dolar amerykański",
                "code" => "USD",
                "bid" => 4.0653,
                "ask" => 4.1475
            ],
            [
                "name" => "dolar australijski",
                "code" => "AUD",
                "bid" => 2.6295,
                "ask" => 2.6827
            ],
            [
                "name" => "dolar kanadyjski",
                "code" => "CAD",
                "bid" => 2.8863,
                "ask" => 2.9447
            ],
            [
                "name" => "euro",
                "code" => "EUR",
                "bid" => 4.2698,
                "ask" => 4.356
            ],
            [
                "name" => "forint (Węgry)",
                "code" => "HUF",
                "bid" => 0.010384,
                "ask" => 0.010594
            ],
            [
                "name" => "frank szwajcarski",
                "code" => "CHF",
                "bid" => 4.5835,
                "ask" => 4.6761
            ],
            [
                "name" => "funt szterling",
                "code" => "GBP",
                "bid" => 5.1114,
                "ask" => 5.2146
            ],
            [
                "name" => "jen (Japonia)",
                "code" => "JPY",
                "bid" => 0.026479,
                "ask" => 0.027013
            ],
            [
                "name" => "korona czeska",
                "code" => "CZK",
                "bid" => 0.1688,
                "ask" => 0.1722
            ],
            [
                "name" => "korona duńska",
                "code" => "DKK",
                "bid" => 0.5724,
                "ask" => 0.584
            ],
            [
                "name" => "korona norweska",
                "code" => "NOK",
                "bid" => 0.3648,
                "ask" => 0.3722
            ],
            [
                "name" => "korona szwedzka",
                "code" => "SEK",
                "bid" => 0.3703,
                "ask" => 0.3777
            ],
            [
                "name" => "SDR (MFW)",
                "code" => "XDR",
                "bid" => 5.3304,
                "ask" => 5.438
            ]
        ];

        $currency = $this->faker->randomElement($currencies);

        return [
            'name' => $currency['name'],
            'code' => $currency['code']
        ];

    }
}
