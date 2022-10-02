<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    use HasFactory;

    public function car(){
        return $this->hasOne(Car::class);
    }

    public function documents(){
        return $this->belongsToMany(Document::class,'documents_insurances','insurance_id','document_id');
    }
}
