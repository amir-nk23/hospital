<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surgery extends Model
{
    use HasFactory;





    public function basicInsurance(): HasOne
    {
        return $this->hasOne(Insurance::class,'basic_insurance_id');
    }


    public function suppinsurance(): HasOne
    {
        return $this->hasOne(Insurance::class,'supp_insurance_id');
    }
}
