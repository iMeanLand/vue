<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    public function wheels()
    {
        return $this->belongsToMany(Wheel::class);
    }

    public function getCarsWithWheels()
    {
        $cars = DB::select("
            SELECT
                *
            FROM
                cars
        ");

        $car_wheels_relations = DB::select("
            SELECT
                *
            FROM
                car_wheel
        ");

        $car_with_wheels = [];
        foreach ($cars as $key => $car) {
            $car_with_wheels[] = $car;
            $car_with_wheels[$key]->wheels = [];

            foreach ($car_wheels_relations as $relation) {
                if ($relation->car_id == $car->id) {
                    $car_with_wheels[$key]->wheels[] = $relation->wheel_id;
                }
            }
        }

        return $car_with_wheels;
    }
}
