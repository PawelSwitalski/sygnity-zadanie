<?php

namespace Database\Seeders;

use App\Models\Currency;
use Database\Factories\CurrencyFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        //CurrencyFactory::factoryForModel(Currency::class)->create();
        $this->createListOfCurrencies();

    }

    /**
     * @return void
     */
    public function createListOfCurrencies(): void
    {
        Currency::factory()->create([
            'name' => 'US dollar',
            'code' => 'USD',
        ]);
        Currency::factory()->create([
            'name' => 'Australian dollar',
            'code' => 'AUD',
        ]);
        Currency::factory()->create([
            'name' => 'Canadian dollar',
            'code' => 'CAD',
        ]);
        Currency::factory()->create([
            'name' => 'Euro',
            'code' => 'EUR',
        ]);
        Currency::factory()->create([
            'name' => 'Forint (Hungary)',
            'code' => 'HUF',
        ]);
        Currency::factory()->create([
            'name' => 'Swiss franc',
            'code' => 'CHF',
        ]);
        Currency::factory()->create([
            'name' => 'Pound sterling',
            'code' => 'GBP',
        ]);
        Currency::factory()->create([
            'name' => 'Yen (Japan)',
            'code' => 'JPY',
        ]);
        Currency::factory()->create([
            'name' => 'Czech koruna',
            'code' => 'CZK',
        ]);
        Currency::factory()->create([
            'name' => 'Danish krone',
            'code' => 'DKK',
        ]);
        Currency::factory()->create([
            'name' => 'Norwegian krone',
            'code' => 'NOK',
        ]);
        Currency::factory()->create([
            'name' => 'Swedish krona',
            'code' => 'SEK',
        ]);
        Currency::factory()->create([
            'name' => 'SDR (Special drawing rights)',
            'code' => 'XDR',
        ]);
    }
}
