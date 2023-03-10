<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    public function cars(){
        return $this->belongsToMany(Car::class,'cars_documents','document_id','car_id');
    }

    public function insurances(){
        return $this->hasMany(Insurance::class);
    }

    public function maintenances(){
        return $this->belongsToMany(Maintenance::class,'documents_maintenances','document_id','maintenance_id');
    }

}
