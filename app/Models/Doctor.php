<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'speciality',
        'national_code',
        'medical_number',
        'mobile',
        'status',
        'password',
        'speciality_id'

    ];


    public function doctor_role(){

        return $this->belongsToMany(DoctorRole::class,'doctor_doctor_role','doctor_id','doctor_role_id');


    }

    public function speciality(){


        return $this->belongsTo(Speciality::class);


    }
}
