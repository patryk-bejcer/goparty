@extends('layouts.app')

@section('content')

    <div class="container">

        @include('layouts.includes.subpages-banner')
        <div class="row justify-content-center">
            @include('dashboard.includes.sidebar')
            <div class="col-md-9">
                <div class="card text-white bg-dark mb-3">
                    <div class="card-header"><h3 class="text-left mt-4"><b>Galeria klubu {{$club->official_name}}</b></h3></div>
                    <div class="card-body">
                        <div class="pb-5 pt-1">
                            {{$club->images}}
                            <club-gallery-manager></club-gallery-manager>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


