<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;

class Speciality extends Model
{
    use HasFactory, HasRoles,LogsActivity;

    protected $table = 'specialities';
    protected $fillable=[

        'title',
        'status',
    ];


    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable();
    }


    public function doctor(){

        return $this->hasMany(Doctor::class);


    }
}
