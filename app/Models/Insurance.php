<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    use HasFactory;

    protected $fillable = ["insurance_carrier","insurance_number","phone","coverage","car_id","due_date","price"];

    public function documents(){
        return $this->belongsToMany(Document::class,'documents_insurances','insurance_id','document_id');
    }
}
