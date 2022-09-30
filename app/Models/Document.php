<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    public function cars(){
        return $this->hasMany(Car::class);
    }

    public function insurances(){
        return $this->hasMany(Insurance::class);
    }

    public function maintenances(){
        return $this->hasMany(Maintenance::class);
    }

}
