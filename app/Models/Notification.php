<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class Notification extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'viewed_at',
        ];



    public static function clearAllCaches(){

        if (Cache::has('notif')){

            Cache::forget('notif');

        }

    }


    public static function booted()
    {


        static::created(function ($invoice){

            activity()->log("کاربر با شناسه".Auth::id()."یک صورتحساب جدید با شناسه".$invoice->id."ایجاد کرد");
            static::clearAllCaches();

        });

    }

}
