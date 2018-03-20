@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div id="register-form" class="">
                    <div class="pb-5 pt-1">
                        <div class="rpw">
                            <div class="col-md-12">

                                <div class="col-md-6 text-left text-white">
                                    <h1>{{ __('Dodaj swój klub') }}</h1>
                                    <h2>{{ __('Za darmo!') }}</h2>
                                </div>
                            </div>
                        </div>

                        <div class="card-body pt-0 text-white">
                            <form method="POST" action="{{ route('register') }}">

                                @csrf

                                <hr>
                                <h2 class="mb-4">Informacje dotyczące dodawanego przez Ciebie klubu</h2>

                                <div class="form-group row">

                                    <div class="col-md-6">
                                        <label for="city" style="" class="">{{ __('Pełna nazwa klubu') }}</label>
                                        <input id="official_name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                               name="official_name" value="{{ old('official_name') }}"
                                               placeholder="Wprowadź nazwe klubu" required autofocus>

                                        @if ($errors->has('official_name'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('official_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                    <div class="col-md-6">
                                        <label for="city" style="" class="">{{ __('Twoje stanowisko') }}</label>
                                        <select name="city" class="form-control" id="city">
                                            <option value="1">Właściciel</option>
                                            <option value="1">Marketing</option>
                                        </select>

                                        @if ($errors->has('city'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                    {{--<div class="col-md-6 mt-2 mb-0">--}}
                                        {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum eligendi nam nesciunt odit officia quasi, sit suscipit! Aut,  vitae?</p>--}}
                                    {{--</div>--}}

                                </div>

                                <div class="form-group row">
                                    {{--<label for="official_name" class="col-md-2 col-form-label text-md-right">{{ __('First name') }}</label>--}}
                                    <div class="col-md-6">
                                        <label for="city" style="" class="">{{ __('Oficjalny aders E-mail') }}</label>
                                        <input id="official_name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                               name="official_name" value="{{ old('official_name') }}"
                                               placeholder="Wprowadź adres email" required autofocus>

                                        @if ($errors->has('official_name'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('official_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>


                                </div>

                                <hr>

                                <div class="form-group row">

                                    <div class="col-md-12">
                                        <h2>Infomacje odnośnie lokalizacji</h2>
                                    </div>

                                    {{--<label for="official_name" class="col-md-2 col-form-label text-md-right">{{ __('First name') }}</label>--}}
                                    <div class="col-md-6">
                                        <label for="city" style="" class="">{{ __('Miasto') }}</label>
                                        <select name="city" class="form-control" id="city">
                                            @foreach($cities as $city)
                                                <option value="{{$city->id}}">{{ ucfirst($city->name) }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('official_name'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('official_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                    <div class="col-md-6">
                                        <label for="city" style="" class="">{{ __('Kod pocztowy') }}</label>
                                        <input id="official_name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                               name="official_name" value="{{ old('official_name') }}"
                                               placeholder="Wprowadź kod pocztowy" required autofocus>

                                        @if ($errors->has('official_name'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('official_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                </div>

                                <div class="form-group row">
                                    {{--<label for="official_name" class="col-md-2 col-form-label text-md-right">{{ __('First name') }}</label>--}}
                                    <div class="col-md-6">
                                        <label for="city" style="" class="">{{ __('Ulica') }}</label>
                                        <input id="official_name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                               name="official_name" value="{{ old('official_name') }}"
                                               placeholder="Wprowadź adres Twojego klubu" required autofocus>

                                        @if ($errors->has('official_name'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('official_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                    <div class="col-md-6">
                                        <label for="city" style="" class="">{{ __('Dodatkowe informacje adresowe') }}</label>
                                        <input id="official_name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                               name="official_name" value="{{ old('official_name') }}"
                                               placeholder="Wprowadź dodatkowe informacje" required autofocus>

                                        @if ($errors->has('official_name'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('official_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <div class="col-md-8">
                                        <b>Lokalizacja na mapie (znacznik można dowolnie przesuwać)</b>
                                        <p>Najlepszym rozwiązaniem jest umieszczenie znacznika w miejscu, w którym znajduje się główne wejście obiektu (jeżeli to możliwe). Jeżeli w obiekcie brak głównego wejścia, znacznik należy umieścić w jego centrum.</p>
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d20382.6768303488!2d17.35093547443469!3d50.31367858521508!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471194c8ca55dffd%3A0x1dc02b9b20f488a8!2zNDgtMzQwIEfFgnVjaG_FgmF6eQ!5e0!3m2!1spl!2spl!4v1521569114614" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                                    </div>
                                </div>

                                <hr>

                                <div class="form-group row">

                                    <div class="col-md-12">
                                        <h2>Infomacje kontaktowe</h2>
                                    </div>

                                    {{--<label for="official_name" class="col-md-2 col-form-label text-md-right">{{ __('First name') }}</label>--}}
                                    <div class="col-md-6">
                                        <label for="city" style="" class="">{{ __('Oficjalny numer telefonu klubu') }}</label>
                                        <input id="official_name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                               name="official_name" value="{{ old('official_name') }}"
                                               placeholder="Wprowadź oficjalny numer telefonu" required autofocus>

                                        @if ($errors->has('official_name'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('official_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                    <div class="col-md-6">
                                        <label for="city" style="" class="">{{ __('Strona WWW') }}</label>
                                        <input id="official_name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                               name="official_name" value="{{ old('official_name') }}"
                                               placeholder="Wprowadź adres strony www" required autofocus>

                                        @if ($errors->has('official_name'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('official_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                </div>

                                <div class="form-group row">
                                    {{--<label for="official_name" class="col-md-2 col-form-label text-md-right">{{ __('First name') }}</label>--}}
                                    <div class="col-md-6">
                                        <label for="city" style="" class="">{{ __('Adres do facebooka') }}</label>
                                        <input id="official_name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                               name="official_name" value="{{ old('official_name') }}"
                                               placeholder="Wprowadź adres profilu facebook" required autofocus>

                                        @if ($errors->has('official_name'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('official_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>


                                </div>


                                <div class="form-group row">

                                    <div class="col-md-6">
                                        <label for="music_types" style="" class="">{{ __('Jaka muzyka jest w Twoim klubie często grana?') }}</label>
                                        <br>

                                    @foreach($musicTypes as $musicType)
                                            <div class="form-check form-check-inline">
                                                <input name="music_types[]" class="form-check-input" type="checkbox" id="musicTypeCheck_{{$musicType->id}}" value="{{$musicType->id}}">
                                                <label class="form-check-label" for="musicTypeCheck_{{$musicType->id}}">{{$musicType->name}}</label>
                                            </div>
                                        @endforeach

                                        @if ($errors->has('music_types'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('music_types') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group row mb-0">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Kolejny krok') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
