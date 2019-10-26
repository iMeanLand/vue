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


}