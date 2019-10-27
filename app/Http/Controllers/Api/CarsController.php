<?php

namespace App\Http\Controllers\Api;

use App\Models\Car;
use Illuminate\Http\Request;

class CarsController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        $car = new Car();
        $cars = $car->with('wheels')->paginate(10);

        return json_encode($cars);
    }

    public function add(Request $request)
    {
        $name = $request->input('name');
        $max_speed = $request->input('max_speed');

        $car = new Car();

        $car->name = $name;
        $car->max_speed = $max_speed;
        $add = $car->save();

        if ($add) {
            return 'success';
        }
    }

    public function edit($id) {
        $car = Car::find($id);

        return view('cars.edit', ['car' => $car]);
    }

}