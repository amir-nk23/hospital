<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'speciality',
        'national_code',
        'medical_number',
        'mobile',
        'status',
        'password',
        'speciality_id'

    ];
}
