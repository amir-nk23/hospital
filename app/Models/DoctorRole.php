<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class DoctorRole extends Model
{
    use HasFactory,LogsActivity;

    protected $table = 'doctor_role';

    protected $fillable=[

        'title',
        'status',
        'required',
        'quota'
    ];


    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable();
    }


    public function doctors(){

        return $this->belongsToMany(Doctor::class,'doctor_doctor_role');


    }

    public static function clearAllCaches(){

        if (Cache::has('doctorRole')){

            Cache::forget('doctorRole');

        }

    }



    protected static function booted()
    {
        static::created(function ($role){

            activity()->log("کاربر با شناسه".Auth::id()."یک نقش جدید با شناسه".$role->id."ایجاد کرد");
            static::clearAllCaches();

        });
        static::updated(function ($role){

            activity()->log("کاربر با شناسه".Auth::id()." نقش  با شناسه".$role->id."را اپدیت کرد");
            static::clearAllCaches();
        });

        static::deleted(function ($role){

            activity()->log("کاربر با شناسه".Auth::id()." نقش  با شناسه".$role->id."را حذف کرد");
            static::clearAllCaches();

        });
    }


}
