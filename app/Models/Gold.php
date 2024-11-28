<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gold extends Model
{
    use HasFactory;

    protected $fillable = ['data', 'price'];

    // Static method to create an array of Gold objects from API data
    public static function fromApiData($apiData)
    {
        $goldData = [];
        foreach ($apiData as $item) {
            // Create Gold objects and store them in an array
            $goldData[] = new self([
               'data' => $item['data'],
               'price' => $item['cena'],
            ]);
        }
        return $goldData;
    }
}
