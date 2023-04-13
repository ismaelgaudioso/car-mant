<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuelPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        "liters",
        "price_liter",
        "payment_date"
    ];
}
