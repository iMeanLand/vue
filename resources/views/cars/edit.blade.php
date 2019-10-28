@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Edit car
                </div>
                <div class="card-body">
                    <Edit action="{{ '/cars/edit/' }}"
                          :fields="{{ $fields }}"
                          :model="{{ $car }}"
                          :button="'Save'">
                    </Edit>
                </div>
            </div>
        </div>
    </div>

@endsection
