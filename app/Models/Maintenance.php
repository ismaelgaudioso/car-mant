<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;

    protected $fillable = ["details","maintenance_type","maintenance_date","price","car_id","kilometers"];

    public function documents(){
        return $this->belongsToMany(Document::class,'documents_maintenances','maintenance_id','document_id');
    }
}
