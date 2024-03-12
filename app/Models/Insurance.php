<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Insurance extends Model
{
    use HasFactory;

    protected $fillable= [

        'name',
        'type',
        'percentage',
        'status',
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(Surgery::class);
    }


    protected static function booted()
    {
        static::created(function ($insurance){

            activity()->log("کاربر با شناسه".Auth::id()."یک بیمه جدید با شناسه".$insurance->id."ایجاد کرد");

        });
        static::updated(function ($insurance){

            activity()->log("کاربر با شناسه".Auth::id()." بیمه با شناسه".$insurance->id."را اپدیت کرد");

        });

        static::deleted(function ($insurance){

            activity()->log("کاربر با شناسه".Auth::id()." بیمه با شناسه".$insurance->id."را حذف کرد");

        });
    }
}
