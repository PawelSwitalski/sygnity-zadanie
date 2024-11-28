<?php
// app/Services/AvatarService.php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class AvatarService
{
    public function saveAvatar($nick, $firstName, $lastName)
    {
        $url = $this->generateAvatarUrl("{$firstName}+{$lastName}");

        $img = 'avatar/' . $nick . '.png';
        Storage::disk('public')->put($img, file_get_contents($url));
    }

    /**
     * Generate the avatar URL.
     *
     * @param  string  $name
     * @param  string  $background
     * @param  string  $color
     * @param  int  $size
     * @param  float  $fontSize
     * @param  bool  $rounded
     * @return string
     */
    public function generateAvatarUrl(
        string $name = 'John+Doe',
        string $background = '',
        string $color = 'FFFFFF',
        int $size = 128,
        float $fontSize = 0.5,
        bool $rounded = true
    ): string {

        if ($background === '') {
            $background = $this->generateBackground();
        }

        // Build query string for the API
        $url = 'https://ui-avatars.com/api/?';

        // Prepare the query parameters
        $queryParams = [
            'name' => $name,
            'background' => $background,
            'color' => $color,
            'size' => $size,
            'font-size' => $fontSize,
            'rounded' => $rounded ? 'true' : 'false'
        ];

        foreach ($queryParams as $key => $value) {
            $url .= $key . '=' . $value . '&';
        }

        return $url;
    }

    public function generateBackground(): string
    {
        $randomNumber1 = mt_rand(100, 200);
        $randomNumber2 = mt_rand(100, 200);
        $randomNumber3 = mt_rand(100, 200);

        $hex1 = dechex($randomNumber1);
        $hex2 = dechex($randomNumber2);
        $hex3 = dechex($randomNumber3);

        $string1 = (string)$hex1;
        $string2 = (string)$hex2;
        $string3 = (string)$hex3;

        $joinedString = $string1 . $string2 . $string3;
        return $joinedString;
    }
}
