<?php

namespace App\Http\Controllers;

use App\Models\Car;

class CarsController extends Controller
{
    public function index()
    {
        $columns = [
            [
                'name' => 'Select',
                'field_name' => '',
                'type' => 'Checkbox'
            ],
            [
                'name' => 'Name',
                'field_name' => 'name',
                'link' => '/cars/edit/',
                'type' => 'Linked',
                'sortable' => true
            ],
            [
                'name' => 'Speed unit',
                'field_name' => 'speed_unit.name',
                'type' => 'Simple',
            ],
            [
                'name' => 'Max Speed',
                'field_name' => 'max_speed',
                'type' => 'Simple',
                'sortable' => true
            ],
            [
                'name' => 'Created At',
                'field_name' => 'created_at',
                'type' => 'Simple',
                'sortable' => true
            ],
            [
                'name' => 'Updated At',
                'field_name' => 'updated_at',
                'type' => 'Simple',
                'sortable' => true
            ],

            [
                'name' => 'Actions',
                'field_name' => 'links',
                'type' => 'Links',
                'links' => [
                    [
                        'label' => 'Edit',
                        'link' => '/cars/view/{id}'
                    ],
                    [
                        'label' => 'Delete',
                        'link' => '/cars/delete/{id}'
                    ],
                ]
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
        $speedUnits = new \App\Models\SpeedUnit();

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
            [
                'label' => 'Speed units',
                'name' => 'speed_unit',
                'type' => 'select',
                'placeholder' => 'Speed unit',
                'required' => true,
                'options' => $speedUnits->get()
            ],
        ];

        return view('cars.add', ['fields' => json_encode($fields)]);
    }

    public function edit($id)
    {
        $speedUnits = new \App\Models\SpeedUnit();

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
                'required' => true
            ],
            [
                'label' => 'Speed units',
                'name' => 'speed_unit_id',
                'type' => 'select',
                'placeholder' => 'Speed unit',
                'required' => true,
                'options' => $speedUnits->get()
            ],
        ];

        $car = Car::find($id);
        return view('cars.edit', ['fields' => json_encode($fields), 'car' => $car]);
    }
}