@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Add car
                </div>
                <div class="card-body">
                    <Add action="{{ '/cars/add' }}"
                         :fields="{{ $fields }}"
                         :button="'Add'">
                    </Add>
                </div>
            </div>
        </div>
    </div>

@endsection
