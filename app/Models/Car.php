<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    public function maintenances(){
        return $this->hasMany(Maintenance::class);
    }

    public function documents(){
        return $this->belongsToMany(Document::class,'cars_documents','car_id','document_id');
    }
}
