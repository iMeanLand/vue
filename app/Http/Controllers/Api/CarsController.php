<?php

namespace App\Http\Controllers\Api;

use App\Models\Car;
use Illuminate\Http\Request;

class CarsController extends \App\Http\Controllers\Controller
{
    public function index(Request $request)
    {
        $car = new Car();

        $query = $cars = $car->with(['wheels', 'speedUnit']);

        if (!empty($request['sortby']) && !empty($request['direction']) && $request['direction'] != 'null') {
            $query->orderBy($request['sortby'], $request['direction']);
        }

        $cars = $query->paginate(10);


        return json_encode($cars);
    }

    public function add(Request $request)
    {
        $car = new Car();

        $car->fill($request->all());
        $result = $car->save();

        if ($result) {
            return 'success';
        }
    }

    public function edit(Request $request, $id)
    {
        $result = Car::find($id)->update($request->all());

        if ($result) {
            return 'success';
        }
    }

}