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
                            <form method="POST" action="{{ route('clubs.store') }}">

                                @csrf

                                @if(!empty($errors->first()))
                                    <div class="row col-lg-12">
                                        <div class="alert alert-danger">
                                            <span>{{ $errors->first() }}</span>
                                        </div>
                                    </div>
                                @endif

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

                                <!--  VUE COMPONENT SEARCH BOX ADDRESS -->
                                <address-search-box></address-search-box>
                                <!--  END VUE COMPONENT -->

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
