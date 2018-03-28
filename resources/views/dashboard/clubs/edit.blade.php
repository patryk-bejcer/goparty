@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('dashboard.includes.sidebar')
            <div class="col-md-9">
                <div class="card text-white bg-dark mb-3">
                    <div class="card-header">
                        <b>Formularz edycji klubu</b>
                    </div>
                    <div class="card-body">

                        <div id="register-club" class="">
                            <div class="pb-5 pt-1">

                                <div class="card-body pt-0 text-white">
                            <form method="POST" action="{{ route('clubs.update', ['id' => $club->id ]) }}">

                                @csrf
                                {{method_field('PUT')}}

                                @if(!empty($errors->first()))
                                    <div class="row col-lg-12">
                                        <div class="alert alert-danger">
                                            <span>{{ $errors->first() }}</span>
                                        </div>
                                    </div>
                                @endif

                                <h2 class="mb-4">Informacje dotyczące dodawanego przez Ciebie klubu</h2>

                                <div class="form-group row">

                                    <div class="col-md-6">
                                        <label for="city" style="" class="">{{ __('Pełna nazwa klubu *') }}</label>
                                        <input id="official_name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                               name="official_name" value="{{ $club->official_name  }}"
                                               placeholder="Wprowadź nazwe klubu" required autofocus>

                                        @if ($errors->has('official_name'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('official_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                    <div class="col-md-6">
                                        <label for="role" style="" class="">{{ __('Twoje stanowisko *') }}</label>
                                        <select name="role" class="form-control" id="role">
                                            <option value="1">Właściciel</option>
                                            <option value="1">Marketing</option>
                                        </select>

                                        @if ($errors->has('role'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('role') }}</strong>
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
                                        <label for="email" style="" class="">{{ __('Oficjalny aders E-mail *') }}</label>
                                        <input id="email" type="email" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                               name="email" value="{{ $club->email  }}"
                                               placeholder="Wprowadź adres email" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>


                                </div>

                                <hr>

                                <div class="form-group row">

                                    <div class="col-md-12">
                                        <h2>Infomacje odnośnie lokalizacji</h2>
                                    </div>

                                    <!--  VUE COMPONENT SEARCH BOX ADDRESS -->
                                    <address-search-box :ismap=true  :latform={{$club->latitude}} :lngform={{$club->longitude}} :fulladdress={{$club->route}}>
                                    </address-search-box>
                                    <!--  END VUE COMPONENT -->

                                    <div class="col-md-4">
                                        <label for="additional_address_info" style="" class="">{{ __('Dodatkowe informacje adresowe') }}</label>
                                        <textarea rows="7" id="additional_address_info" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                               name="additional_address_info"
                                                  placeholder="Wprowadź dotatkowe informacje adresowe (wskazówki dojazdu itp.)">{{ $club->additional_address_info  }}</textarea>

                                        @if ($errors->has('additional_address_info'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('additional_address_info') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                </div>



                                <hr>

                                <div class="form-group row">

                                    <div class="col-md-12">
                                        <h2>Infomacje kontaktowe</h2>
                                    </div>

                                    {{--<label for="official_name" class="col-md-2 col-form-label text-md-right">{{ __('First name') }}</label>--}}
                                    <div class="col-md-6">
                                        <label for="phone" style="" class="">{{ __('Oficjalny numer telefonu klubu *') }}</label>
                                        <input id="phone" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                               name="phone" value="{{ $club->phone  }}"
                                               placeholder="Wprowadź oficjalny numer telefonu" required autofocus>

                                        @if ($errors->has('phone'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                    <div class="col-md-6">
                                        <label for="website_url" style="" class="">{{ __('Strona WWW') }}</label>
                                        <input id="website_url" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                               name="website_url" value="{{ $club->website_url  }}"
                                               placeholder="Wprowadź adres strony www">

                                        @if ($errors->has('website_url'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('website_url') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                </div>

                                <div class="form-group row">
                                    {{--<label for="official_name" class="col-md-2 col-form-label text-md-right">{{ __('First name') }}</label>--}}
                                    <div class="col-md-6">
                                        <label for="facebook_url" style="" class="">{{ __('Adres do facebooka') }}</label>
                                        <input id="facebook_url" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                               name="facebook_url" value="{{ $club->facebook_url  }}"
                                               placeholder="Wprowadź adres profilu facebook">

                                        @if ($errors->has('facebook_url'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('facebook_url') }}</strong>
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
                                            {{ __('Dalej >>') }}
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
        </div>
    </div>
@endsection
