<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ["name","desc","car_license","first_purchase_date","purchase_date"];

    public function maintenances(){
        return $this->hasMany(Maintenance::class);
    }

    public function documents(){
        return $this->belongsToMany(Document::class,'cars_documents','car_id','document_id');
    }
}
