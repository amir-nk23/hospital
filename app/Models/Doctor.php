<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Doctor extends Authenticatable
{
    use HasFactory,HasApiTokens,HasRoles;

    protected $fillable = [

        'name',
        'speciality',
        'national_code',
        'medical_number',
        'mobile',
        'status',
        'password',
        'speciality_id',
        'email'

    ];



//    public function getActivitylogOptions(): LogOptions
//    {
//        return LogOptions::defaults()->logFillable();
//    }


    public function doctor_role(){

        return $this->belongsToMany(DoctorRole::class,'doctor_doctor_role','doctor_id','doctor_role_id');


    }

    public function surgery(){

        return $this->belongsToMany(Surgery::class,'doctor_surgery','doctor_id','surgery_id');


    }

    public function speciality(){


        return $this->belongsTo(Speciality::class);


    }

    public static function clearAllCaches(){

        if (Cache::has('doctor')){

            Cache::forget('doctor');
            Cache::forget('invoiceDoctor');

        }

    }



    protected static function booted()
   {
       static::created(function ($doctor){

           activity()->log("کاربر با شناسه".Auth::id()."یک دکتر جدید با شناسه".$doctor->id."ایجاد کرد");
           static::clearAllCaches();

       });
       static::updated(function ($doctor){

           activity()->log("کاربر با شناسه".Auth::id()." دکتر  با شناسه".$doctor->id."را اپدیت کرد");
           static::clearAllCaches();

       });

       static::deleted(function ($doctor){

           activity()->log("کاربر با شناسه".Auth::id()." دکتر  با شناسه".$doctor->id."را حذف کرد");
           static::clearAllCaches();

       });
   }
}
