@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('dashboard.includes.sidebar')
            <div class="col-md-9">
                <div class="card text-white bg-dark mb-3">
                    <div class="card-header">
                        <b>Podgląd klubu {{$club->official_name}}</b>
                    </div>
                    <div class="card-body">
                        {{$club}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
