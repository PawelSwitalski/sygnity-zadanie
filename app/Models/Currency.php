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
    protected $fillable = ['name', 'code'];

    /**
     * Temporary attributes: 'ask' and 'bid'
     *
     * These are not stored in the database but can be accessed like normal attributes.
     */
    private $tempAttributes = [];

    public function users()
    {
        return $this->belongsToMany(User::class, 'currency_user');
    }

    /**
     * Getter for temporary attributes.
     *
     * @param string $key
     * @return mixed
     */
    public function __get($key)
    {
        if (array_key_exists($key, $this->tempAttributes)) {
            return $this->tempAttributes[$key];
        }

        return parent::__get($key);
    }

    /**
     * Setter for temporary attributes.
     *
     * @param string $key
     * @param mixed $value
     */
    public function __set($key, $value)
    {
        if (in_array($key, ['ask', 'bid'])) {
            $this->tempAttributes[$key] = $value;
        } else {
            parent::__set($key, $value);
        }
    }
}
