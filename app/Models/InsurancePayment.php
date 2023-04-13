<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsurancePayment extends Model
{
    use HasFactory;

    protected $fillable = [
        "payment_date",
        "price"
    ];

}
