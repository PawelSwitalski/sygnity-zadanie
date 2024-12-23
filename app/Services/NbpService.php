<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class NbpService
{
    protected $apiUrlCurrency = 'https://api.nbp.pl/api/exchangerates/rates/c';

    protected $apiUrlGoldLastTen = 'https://api.nbp.pl/api/cenyzlota/last/10/?format=json';

    public function getCurrencyData($currencyCode, $date = null)
    {
        if ($date == null) {
            return Cache::remember("currency_data_{$currencyCode}", now()->addHours(1), function () use ($currencyCode) {
                $response = Http::get("{$this->apiUrlCurrency}/{$currencyCode}/last/?format=json");

                if ($response->successful()) {
                    return $response->json();
                }

                return null;
            });
        } else {
            $url = "{$this->apiUrlCurrency}/{$currencyCode}/{$date}/?format=json";
            $response = Http::get($url);

            if ($response->successful()) {
                return $response->json();
            }

            return null;
        }
    }

    public function getGoldLastTenDays()
    {
        return Cache::remember("gold", now()->addHours(2), function () {
            $response = Http::get($this->apiUrlGoldLastTen);

            if ($response->successful()) {
                return $response->json();
            }

            return null;
        });
    }
}

// https://api.nbp.pl/api/exchangerates/rates/{table}/{code}/last/
// https://api.nbp.pl/api/cenyzlota/last/10/?format=json
