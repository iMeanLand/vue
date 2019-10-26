<?php

namespace App\Http\Controllers;

use App\Models\Car;

class CarsController extends Controller
{
    public function index()
    {
        $car = new Car();
        $cars = $car->with('wheels')->get();

        return view('home', ['cars' => $cars]);
    }

    public function attachWheel($car, $wheel)
    {
        $car = Car::find($car);
        $car->wheels()->attach($wheel);
    }

    public function detachWheel($car, $wheel)
    {
        $car = Car::find($car);
        $car->wheels()->detach($wheel);
    }
}