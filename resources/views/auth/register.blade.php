@extends('layouts.app')

{!! NoCaptcha::renderJs() !!}

@section('content')

    <div class="container">


        @include('layouts.includes.subpages-banner')
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div id="register-form" class="auth-form">
                    <div class="card pb-5 pt-1">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-5 offset-md-1 mt-5">
                                    <a href="{{url('/login')}}" class="btn btn-primary">
                                        Logowanie
                                    </a>
                                </div>
                                <div class="col-md-6 text-right">
                                    <h1>{{ __('Zarejestruj się') }}</h1>
                                    <h2>{{ __('Za darmo!') }}</h2>
                                </div>
                            </div>
                        </div>

                        <div class="card-body pt-0" style="background-color: transparent">
                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                            <form id="register-form" method="POST" action="{{ route('register') }}">

                                @csrf

                                <div class="form-group row">
                                    {{--<label for="first_name" class="col-md-2 col-form-label text-md-right">{{ __('First name') }}</label>--}}

                                    <div class="col-md-6 offset-md-1">
                                        <input id="first_name" type="text"
                                               class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                               name="first_name" value="{{ old('first_name') }}"
                                               placeholder="Imię" required autofocus>

                                        @if ($errors->has('first_name'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="last_name" style="display: none"
                                           class="col-md-2 col-form-label text-md-right">{{ __('Last name') }}</label>

                                    <div class="col-md-6 offset-md-1">
                                        <input id="last_name" type="text"
                                               class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                               name="last_name" value="{{ old('last_name') }}"
                                               placeholder="Nazwisko" required autofocus>

                                        @if ($errors->has('last_name'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" style="display: none"
                                           class="col-md-2 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6 offset-md-1">
                                        <input id="email" type="email"
                                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                               name="email" value="{{ old('email') }}"
                                               placeholder="Adres E-mail" required>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" style="display: none"
                                           class="col-md-2 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6 offset-md-1">
                                        <input id="password" type="password"
                                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                               placeholder="Hasło" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" style="display: none"
                                           class="col-md-2 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6 offset-md-1">
                                        <input id="password-confirm" type="password" class="form-control"
                                               placeholder="Powtórz hasło" name="password_confirmation" required>
                                    </div>
                                </div>

                                {{--<div class="form-group row">--}}

                                {{--<label for="city" style="display: none" class="col-md-2 col-form-label text-md-right">{{ __('Miasto') }}</label>--}}
                                {{--<div class="col-md-6 offset-md-1">--}}
                                {{--<select name="city" class="form-control" id="city">--}}
                                {{--@foreach($cities as $city)--}}
                                {{--<option value="{{$city->id}}">{{ ucfirst($city->name) }}</option>--}}
                                {{--@endforeach--}}
                                {{--</select>--}}

                                {{--@if ($errors->has('city'))--}}
                                {{--<span class="invalid-feedback">--}}
                                {{--<strong>{{ $errors->first('city') }}</strong>--}}
                                {{--</span>--}}
                                {{--@endif--}}
                                {{--</div>--}}
                                {{--</div>--}}


                                <div class="form-group row">
                                    <label for="music_types" style="display: none"
                                           class="col-md-2 col-form-label text-md-right">{{ __('Music Types') }}</label>

                                    <div class="col-md-6 offset-md-1">
                                        @foreach($musicTypes as $musicType)
                                            <div class="form-check form-check-inline">
                                                <input name="music_types[]" class="form-check-input" type="checkbox"
                                                       id="musicTypeCheck_{{$musicType->id}}"
                                                       value="{{$musicType->id}}">
                                                <label class="form-check-label"
                                                       for="musicTypeCheck_{{$musicType->id}}">{{$musicType->name}}</label>
                                            </div>
                                        @endforeach

                                        @if ($errors->has('music_types'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('music_types') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-8 offset-md-1">

                                        <div class="form-check">
                                            <input name="accept_check" class="form-check-input" type="checkbox"  id="accept_check">
                                            <label class="form-check-label" for="accept_check">
                                                Oświadczam, że znam i akceptuję postanowienia Regulaminu <a
                                                        href="{{route('private-policy')}}">GoToParty.pl</a>
                                            </label>
                                        </div>

                                        @if ($errors->has('accept_check'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('accept_check') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>



                                <div class="form-group row mb-3">
                                    <div class="col-md-6 offset-md-1">
                                        {!! NoCaptcha::display() !!}
                                        @if ($errors->has('g-recaptcha-response'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-1">
                                <button type="submit" class="btn btn-primary">
                                {{ __('Zarejestruj mnie!') }}
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
