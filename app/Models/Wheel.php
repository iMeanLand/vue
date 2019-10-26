<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wheel extends Model
{
    public function cars()
    {
        return $this->belongsToMany(Car::class);
    }
}
