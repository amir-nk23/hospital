<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorRole extends Model
{
    use HasFactory;

    protected $table = 'doctor_role';

    protected $fillable=[

        'title',
        'status',
    ];



    public function doctors(){

        return $this->belongsToMany(Doctor::class,'doctor_doctor_role');


    }


}
