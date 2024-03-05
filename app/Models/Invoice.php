<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;

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


        return $this->belongsToMany(Surgery::class,'doctor_surgery','invoice_id','surgery_id')->withPivot('doctor_role_id','amount');

    }

    public function isDeletable()
    {

        return $this->payments->where('status',1)->count()>1 || $this->attributes['status']==1;

    }

    public function doctorSurgery(){


        return $this->belongsTo(DoctorSurgery::class,'invoice_id');

    }


    public function payments(){

        return $this->hasMany(Payment::class,'invoice_id');

    }
    public static function booted()
    {

        static::deleting(function (Invoice $invoice){

            if ($invoice->payments->where('status',1)->count()>0){

                toastr()->error('صورت حابی که قصد حذف ان را دارید دارای مقدار پرداختی میباشد');
                redirect()->back();

            }


        });

    }

}
