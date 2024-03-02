<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
}
