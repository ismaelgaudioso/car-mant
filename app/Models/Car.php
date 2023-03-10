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

    public function medias(){
        return $this->belongsToMany(Media::class,'cars_media','car_id','media_id');
    }
}
