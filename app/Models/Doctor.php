<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Doctor extends Model
{
    use HasFactory,LogsActivity;

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



    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable();
    }


    public function doctor_role(){

        return $this->belongsToMany(DoctorRole::class,'doctor_doctor_role','doctor_id','doctor_role_id');


    }

    public function surgery(){

        return $this->belongsToMany(DoctorRole::class,'doctor_surgery','doctor_id','surgery_id');


    }

    public function speciality(){


        return $this->belongsTo(Speciality::class);


    }
}
