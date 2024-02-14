<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class DoctorRole extends Model
{
    use HasFactory,LogsActivity;

    protected $table = 'doctor_role';

    protected $fillable=[

        'title',
        'status',
        'required'
    ];


    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable();
    }


    public function doctors(){

        return $this->belongsToMany(Doctor::class,'doctor_doctor_role');


    }


}
