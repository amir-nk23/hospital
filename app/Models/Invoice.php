<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends BaseModel
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

    public function surgeries(){


        return $this->belongsToMany(Surgery::class,'doctor_surgery','invoice_id','surgery_id')->withPivot('doctor_role_id');

    }

    public function payments(){

        return $this->hasMany(Payment::class,'invoice_id');

    }
    public static function booted()
    {

        static::deleting(function (Invoice $invoice){



        });

    }

}
