@extends('layouts.app')

@section('content')

    <div class="container">

        @include('layouts.includes.subpages-banner')

        <div class="row justify-content-center flex-column-reverse flex-md-row">

            @include('dashboard.includes.sidebar')

            <div class="col-12 col-md-9 p-4 pl-0 pb-0 mb-0 justify-content-center align-items-center" style="background: #0c051e;">
                <h3 class="text-white text-center">Panel powiadomień</h3>
                <h5 class="text-center mt-5">Aktualnie brak powiadomień</h5>
            </div>




        </div>
    </div>

@endsection

