<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = ["name","file_name","mime_type","path","disk","file_hash","collection","size"];

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
