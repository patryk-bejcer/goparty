@extends('layouts.app')

@section('content')

    @include('layouts.includes.subpages-banner')
    <div class="row justify-content-center">
        @include('dashboard.includes.sidebar')
        <div class="col-md-9">
            <h1 class="pl-0">Dodawanie nowego klubu trwa...</h1>
            <p>Twój klub został pomyślnie dodany, teraz zostanie poddany weryfikacji przez pracowników portalu
                , po poprawnej weryfkicaji klub zostanie opublikowany na stronie a ty będziesz jego jedynym menadżerem.</p>
            <h4>Dziękujemy bardzo, do zaraz!</h4>
        </div>
    </div>
@endsection
