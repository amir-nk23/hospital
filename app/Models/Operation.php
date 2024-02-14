<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Operation extends Model
{
    use HasFactory,LogsActivity;

    protected $fillable=[

        'name',
        'price',
        'status',
    ];


    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable();
    }


    public function surgery(){

        return $this->belongsToMany(Surgery::class,'operation_surgery','operation_id','surgery_id')->withPivot('amount');


    }
}
