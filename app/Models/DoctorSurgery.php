<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorSurgery extends Model
{
    use HasFactory;


    protected $table = 'doctor_surgery';
    public function surgery(){

        return $this->belongsTo(Surgery::class,);

    }

    public function doctors(){

        return $this->belongsTo(Doctor::class,'doctor_id');

    }

    public function doctorRole(){

        return $this->belongsTo(DoctorRole::class,'doctor_role_id');

    }

    public function getDoctorQuotaAmount()
    {


         return round(($this->doctorRole->quota /100) * $this->surgery->getTotalPrice());


    }
}
