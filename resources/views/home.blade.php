@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <app-table action="{{ '/cars' }}" :columns="{{ $columns }}">
                            <template v-slot:column.name="{ item }">
                                Name: @{{ item.name }}
                            </template>
                            <template v-slot:column.max_speed>
                                1231231
                            </template>
                            <template v-slot:column.created_at>
                                Created
                            </template>
                            <template v-slot:column.updated_at>
                                201912312
                            </template>
                        </app-table>
                        You are logged in!
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
