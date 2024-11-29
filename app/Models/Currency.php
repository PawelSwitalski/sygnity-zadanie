<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    // Disable automatic timestamp handling
    public $timestamps = false;

    protected $table = 'currencies';

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



    public static function fromApiData($apiData): Currency
    {

        // Extract the rates from the data
        $rates = $apiData['rates'][0];

        // Convert the bid and ask values to strings
        $bid = (string) $rates['bid'];
        $ask = (string) $rates['ask'];

        return new self([
            'name' => $apiData['currency'],  // Currency name
            'code' => $apiData['code'],      // Currency code
            'ask'  => $ask,               // Ask rate
            'bid'  => $bid,               // Bid rate
        ]);
    }
}
