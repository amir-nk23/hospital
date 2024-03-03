<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'group',
        'label',
        'type',
        'value',
        'name',
    ];

    public static function clearAllCaches(){

        if (Cache::has('settings')){

            Cache::forget('settings');

        }

    }

    protected static function booted()
    {

        static::updated(function (){

            static::clearAllCaches();

        });
    }
}
