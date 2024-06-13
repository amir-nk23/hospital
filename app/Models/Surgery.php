<?php

namespace App\Models;

use http\Env\Url;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Surgery extends BaseModel
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

    public function insurance(string $type){

        return $type == 'basic'?$this->basicInsurance:$this->suppinsurance;

    }

    public function getDoctorQuotaAmount(DoctorRole $doctorRole):int
    {

//        $doctorRole = DoctorRole::find($id);
        $amount =  round(($doctorRole->quota /100) * $this->getTotalPrice());

       return $amount;


        }


    public function invoices(){


        return $this->belongsToMany(Invoice::class,'doctor_surgery','surgery_id','invoice_id')->withPivot('doctor_role_id','amount');

    }


    public function getDoctorInsuranceAmount($id):int
    {

        $insurance = Insurance::find($id);
        $amount =  round(($insurance->percentage /100) * $this->getTotalPrice());

        return $amount;


    }

    public static function getTotalInsuranceAmount($id,$total):int
    {

        $insurance = Insurance::find($id);
        $amount =  round(($insurance->percentage /100) * $total);

        return $amount;


    }


    public function getDoctorQuotaInvoice($id):int
    {

        $doctorRole = DoctorRole::find($id);
        $amount =  round(($doctorRole->quota /100) * $this->getTotalPrice());

        return $amount;


    }



    public static function clearAllCaches(){

        if (Cache::has('Surgery')){

            Cache::forget('Surgery');

        }

    }

    protected static function booted()
    {
        static::created(function ($surgery){

            activity()->log("کاربر با شناسه".Auth::id()."یک جراحی جدید با شناسه".$surgery->id."ایجاد کرد");
            static::clearAllCaches();

        });
        static::updated(function ($surgery){

            activity()->log("کاربر با شناسه".Auth::id()." جراحی با شناسه".$surgery->id."را اپدیت کرد");
            static::clearAllCaches();

        });

        static::deleted(function ($surgery){

            activity()->log("کاربر با شناسه".Auth::id()." جراحی با شناسه".$surgery->id."را حذف کرد");
            static::clearAllCaches();

        });
    }







}
