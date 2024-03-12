<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Operation extends BaseModel
{
    use HasFactory,LogsActivity;

    protected $fillable=[

        'name',
        'price',
        'status',
    ];


    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable();
    }

    public function surgery(){

        return $this->belongsToMany(Surgery::class,'operation_surgery','operation_id','surgery_id')->withPivot('amount');


    }

    public static function clearAllCaches(){

        if (Cache::has('operation')){

            Cache::forget('operation');

        }

    }


    protected static function booted()
    {
        static::created(function ($operation){

            activity()->log("کاربر با شناسه".Auth::id()."یک عمل جدید با شناسه".$operation->id."ایجاد کرد");
            static::clearAllCaches();

        });
        static::updated(function ($operation){

            activity()->log("کاربر با شناسه".Auth::id()." عمل با شناسه".$operation->id."را اپدیت کرد");
            static::clearAllCaches();
        });

        static::deleted(function ($operation){

            activity()->log("کاربر با شناسه".Auth::id()." عمل با شناسه".$operation->id."را حذف کرد");
            static::clearAllCaches();
        });
    }
}
