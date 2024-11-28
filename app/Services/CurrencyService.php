<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class CurrencyService
{
    protected $apiUrlCurrency = 'https://api.nbp.pl/api/exchangerates/rates/c';

    public function getCurrencyData($currencyCode)
    {
        return Cache::remember("currency_data_{$currencyCode}", now()->addHours(1), function () use ($currencyCode) {
            $response = Http::get("{$this->apiUrlCurrency}/{$currencyCode}/today/?format=json");

            if ($response->successful()) {
                return $response->json();
            }

            return null;
        });
    }
}

// https://api.nbp.pl/api/exchangerates/rates/{table}/{code}/today/
