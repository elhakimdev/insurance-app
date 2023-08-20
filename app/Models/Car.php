<?php

namespace App\Models;

use App\Models\Series;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    use HasFactory;
    public function series(){
        return $this->hasMany(Series::class);
    }
}

