<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;

class Speciality extends Model
{
    use HasFactory, HasRoles,LogsActivity;

    protected $table = 'specialities';
    protected $fillable=[

        'title',
        'status',
    ];


    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable();
    }


    public function doctor(){

        return $this->hasMany(Doctor::class);


    }


    public static function clearAllCaches(){

        if (Cache::has('speciality')){

            Cache::forget('speciality');

        }

    }

    protected static function booted()
    {
        static::created(function ($speciality){

            activity()->log("کاربر با شناسه".Auth::id()."یک تخصص جدید با شناسه".$speciality->id."ایجاد کرد");

            static::clearAllCaches();

        });
        static::updated(function ($speciality){

            activity()->log("کاربر با شناسه".Auth::id()." تخصص با شناسه".$speciality->id."را اپدیت کرد");
            static::clearAllCaches();
        });

        static::deleted(function ($speciality){

            activity()->log("کاربر با شناسه".Auth::id()." تخصص با شناسه".$speciality->id."را حذف کرد");
             static::clearAllCaches();
        });
    }
}
