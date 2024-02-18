<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [

        'doctor_id',
        'amount',
        'description',
        'status'
    ];

    public function doctors()
    {

        return $this->belongsTo(Doctor::class,'doctor_id');

    }

    public function surgery(){


        return $this->belongsToMany(Surgery::class,'doctor_surgery','invoice_id','surgery_id')->withPivot('doctor_role_id');

    }

}
