@extends('layouts.app')

@section('content')

    <div class="container">


        @include('layouts.includes.subpages-banner')
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div id="login-form" class="auth-form">
                    <div class="card pb-5">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-5 offset-md-1 mt-5">
                                    <a href="{{url('/register')}}" class="btn btn-primary">
                                        Rejestracja
                                    </a>
                                </div>
                                <div class="col-md-6 text-right">
                                    <h1>{{ __('Zaloguj się') }}</h1>
                                    <h2>{{ __('nie czekaj') }}</h2>
                                </div>
                            </div>
                        </div>

                        <div class="card-body" style="background-color: transparent">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                @if(session()->has('login_error'))
                                    <div class="alert alert-success">
                                        {{ session()->get('login_error') }}
                                    </div>
                                @endif

                                <div class="form-group row">
                                    <label for="email"
                                           class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                               name="email" value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                               name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"
                                                       name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary mb-3">
                                            {{ __('Zaloguj się') }}
                                        </button>
                                        <br>
                                        <a class="btn-link mt-5" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
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
