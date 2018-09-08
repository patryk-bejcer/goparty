@extends('layouts.app')

@section('content')

    @include('layouts.includes.subpages-banner')
    <div class="row justify-content-center">
        @include('dashboard.includes.sidebar')
        <div class="col-md-9">
            <div class="card text-white bg-dark mb-3 p-3">
            <h1 class="pl-0 ml-0">Dodawanie nowego klubu trwa...</h1>
            <p>Twój klub został pomyślnie dodany, teraz zostanie poddany weryfikacji przez pracowników portalu
                , po poprawnej weryfkicaji klub zostanie opublikowany na stronie a ty będziesz jego jedynym menadżerem.</p>
            <h5>Dziękujemy bardzo, do zaraz!</h5>
            </div>
        </div>
    </div>
@endsection
