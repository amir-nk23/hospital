<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use function PHPUnit\Framework\assertGreaterThanOrEqual;

class Payment extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'invoice_id',
        'amount',
        'pay_type',
        'due_date',
        'receipt',
        'status',
    ];

    public function invoices()
    {

        return $this->belongsTo(Invoice::class,'invoice_id');

    }

    public static function clearAllCaches(){

        if (Cache::has('payment')){

            Cache::forget('payment');

        }

    }

    protected static function booted()
    {
        static::created(function ($payment){

            activity()->log("کاربر با شناسه".Auth::id()."یک پرداخت جدید با شناسه".$payment->id."ایجاد کرد");

            static::clearAllCaches();
        });
        static::updated(function ($payment){

            activity()->log("کاربر با شناسه".Auth::id()." پرداخت با شناسه".$payment->id."را اپدیت کرد");

            static::clearAllCaches();
        });

        static::deleted(function ($payment){

            activity()->log("کاربر با شناسه".Auth::id()." پرداخت با شناسه".$payment->id."را حذف کرد");

            static::clearAllCaches();
        });
    }
}
