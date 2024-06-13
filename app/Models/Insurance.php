<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class Insurance extends Model
{
    use HasFactory;

    protected $fillable= [

        'name',
        'type',
        'percentage',
        'status',
    ];


    public function basicInsuranceSurgeries()
    {
        return $this->hasMany(Surgery::class,'basic_insurance_id');
    }



    public function suppInsuranceSurgeries()
    {
        return $this->hasMany(Surgery::class,'','supp_insurance_id');
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(Surgery::class);
    }


    public static function clearAllCaches(){

        if (Cache::has('insurance')){

            Cache::forget('insurance');


        }

    }


    protected static function booted()
    {
        static::created(function ($insurance){

            activity()->log("کاربر با شناسه".Auth::id()."یک بیمه جدید با شناسه".$insurance->id."ایجاد کرد");
            static::clearAllCaches();
        });
        static::updated(function ($insurance){

            activity()->log("کاربر با شناسه".Auth::id()." بیمه با شناسه".$insurance->id."را اپدیت کرد");

            static::clearAllCaches();
        });

        static::deleted(function ($insurance){

            activity()->log("کاربر با شناسه".Auth::id()." بیمه با شناسه".$insurance->id."را حذف کرد");

            static::clearAllCaches();
        });
    }
}
