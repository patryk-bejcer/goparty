@extends('layouts.app')

@section('content')

    <div class="container">

        @include('layouts.includes.subpages-banner')
        <div class="row justify-content-center">
            @include('dashboard.includes.sidebar')
            <div class="col-md-9">
                <div class="card text-white bg-dark mb-3">
                    <div class="card-header"><h2 class="text-center mt-4"><b>Klub dodany pomyślnie</b></h2></div>
                    <div class="card-body">
                        <div class="pb-5 pt-1">
                            <div class="card-body pt-0 text-white text-center">
                                <p>Twój klub został pomyślnie dodany, teraz zostanie poddany weryfikacji przez
                                    pracowników portalu
                                    , po poprawnej weryfkicaji klub zostanie opublikowany na stronie a ty będziesz
                                    jego jedynym menadżerem.</p>
                                <p>Kopia tej wiadomości została wysłana na Twój adres e-mail.</p>
                                <h6>Dziękujemy bardzo, za dodanie klubu.</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


