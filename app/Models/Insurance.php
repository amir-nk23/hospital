<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}