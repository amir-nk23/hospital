<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Surgery extends Model
{
    use HasFactory,LogsActivity;


    protected $fillable = ['patient_name','patient_national_code','basic_insurance_id','supp_insurance_id','document_number','description','surgeried_at','released_at'];



    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable();
    }

    public function getTotalPrice()
    {
        return $this->operation()->sum('amount');
    }

    public function basicInsurance()
    {
        return $this->belongsTo(Insurance::class,'basic_insurance_id');
    }


    public function suppinsurance()
    {
        return $this->belongsTo(Insurance::class,'supp_insurance_id');
    }


    public function operation(){

        return $this->belongsToMany(Operation::class,'operation_surgery','surgery_id','operation_id')->withPivot('amount');


    }


    public function doctors(){

        return $this->belongsToMany(Doctor::class,'doctor_surgery','surgery_id','doctor_id')->withPivot('doctor_role_id','amount');


    }

    public function getDoctorQuotaAmount(DoctorRole $doctorRole):int
    {

        $amount =  round(($doctorRole->quota /100) * $this->getTotalPrice());

       return $amount;


    }
}
