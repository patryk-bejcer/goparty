@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center transparent-bg content pt-4">
            <div class="col-md-12">

                <h1><a href="">{{$club->official_name}}</a></h1>

                {{$club}}

            </div>
        </div>
    </div>
@endsection
