<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    // Disable automatic timestamp handling
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'code', 'ask', 'bid'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'currency_user');
    }

    // Custom static method to create a Currency object with API data
    public static function fromApiData($apiData, $currency): Currency
    {

        $rates = $apiData['rates'];

        $bid = (string) $rates[0]['bid'];
        $ask = (string) $rates[0]['ask'];

        return new self([
            'name' => $currency['name'],
            'code' => $currency['code'],
            'ask' => $ask,
            'bid' => $bid
        ]);
    }
}
