<?php

namespace App\Http\Controllers;

use App\Models\Car;

class CarsController extends Controller
{
    public function index()
    {
        $columns = [
            [
                'name' => 'Name',
                'field_name' => 'name',
                'link' => '/cars/edit/'
            ],
            [
                'name' => 'Max Speed',
                'field_name' => 'max_speed',
            ],
            [
                'name' => 'Created At',
                'field_name' => 'created_at',
            ],
            [
                'name' => 'Updated At',
                'field_name' => 'updated_at',
            ],
        ];

        return view('home', ['columns' => json_encode($columns)]);
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

    public function add()
    {
        $fields = [
            [
                'label' => 'Name',
                'name' => 'name',
                'type' => 'text',
                'placeholder' => 'Name',
                'required' => true
            ],
            [
                'label' => 'Max speed',
                'name' => 'max_speed',
                'type' => 'text',
                'placeholder' => 'Max speed',
                'required' => false
            ],
        ];

        return view('cars.add', ['fields' => json_encode($fields)]);
    }

    public function edit($id)
    {
        $fields = [
            [
                'label' => 'Name',
                'name' => 'name',
                'type' => 'text',
                'placeholder' => 'Name',
                'required' => true
            ],
            [
                'label' => 'Max speed',
                'name' => 'max_speed',
                'type' => 'text',
                'placeholder' => 'Max speed',
                'required' => false
            ],
        ];

        $car = Car::find($id);

        return view('cars.edit', ['fields' => json_encode($fields), 'car' => $car]);
    }
}