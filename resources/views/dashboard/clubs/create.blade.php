@extends('layouts.app')

@section('content')

    <div class="container">

        @include('layouts.includes.subpages-banner')
        <div class="row justify-content-center">
            @include('dashboard.includes.sidebar')
            <div class="col-md-9">
                <div class="card text-white bg-dark mb-3">
                    <div class="card-header">
                        <b>Formularz dodawania nowego klubu</b>
                    </div>
                    <div class="card-body">

                        <div id="register-club" class="">
                            <div class="pb-5 pt-1">

                                <div class="card-body pt-0 text-white">
                                    <form method="POST" action="{{ route('clubs.store') }}" enctype="multipart/form-data">

                                        @csrf

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
                                                <label for="city" style=""
                                                       class="">{{ __('Pełna nazwa klubu *') }}</label>
                                                <input id="official_name" type="text"
                                                       class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                       name="official_name" value="{{ old('official_name') }}"
                                                       placeholder="Wprowadź nazwe klubu" required autofocus>

                                                @if ($errors->has('official_name'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('official_name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="col-md-6">
                                                <label for="role" style=""
                                                       class="">{{ __('Twoje stanowisko *') }}</label>
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
                                                <label for="email" style=""
                                                       class="">{{ __('Oficjalny aders E-mail *') }}</label>
                                                <input id="email" type="email"
                                                       class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                       name="email" value="{{ old('email') }}"
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
                                            <address-search-box :ismap=true></address-search-box>
                                            <!--  END VUE COMPONENT -->



                                            <div class="col-md-6">
                                                <div class="input-group mb-3 mb-md-4 col-md-12 mr-0 pr-0 p-0">

                                                    <div class="row flex-column mb-0">
                                                        <div class="col-md-12">
                                                            <p class="mb-2">Zdjęcie klubu <br>
                                                                <small>dozwolone formaty to JPG//PNG/GIF, rozmiar nie powinien
                                                                    przekraczać 5MB
                                                                </small>
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <image-component></image-component>

                                                    @if ($errors->has('image'))
                                                        <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('image') }}</strong>
                                                    </span>
                                                    @endif

                                                </div>
                                                {{--<div class="mb-2 form-group{{ $errors->has('club_img') ? ' has-error' : '' }}">--}}
                                                    {{--<label for="">Główne zdjęcie klubu</label>--}}
                                                    {{--<input name="club_img" type="file"--}}
                                                           {{--class="form-control upload-input mb-1"--}}
                                                           {{--placeholder="Wybierz zdjęcie główne" accept=".jpg,.jpeg"--}}
                                                           {{--onchange="loadFile(event)" multiple>--}}

                                                    {{--@if ($errors->has('club_img'))--}}
                                                        {{--<span class="help-block">--}}
                                                             {{--<small class="text-danger">{{ $errors->first('club_img') }}</small>--}}
                                                        {{--</span>--}}
                                                    {{--@endif--}}

                                                {{--</div>--}}
                                                {{--<img class="img-fluid mb-1" id="output" src=""/>--}}

                                                <div class="clearfix mt-1"></div>

                                                <label for="additional_address_info" style=""
                                                       class="">{{ __('Dodatkowe informacje adresowe') }}</label>
                                                <textarea rows="7" id="additional_address_info" type="text"
                                                          class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                          name="additional_address_info"
                                                          value="{{ old('additional_address_info') }}"
                                                          placeholder="Wprowadź dotatkowe informacje adresowe (wskazówki dojazdu itp.)"></textarea>

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
                                                <label for="phone" style=""
                                                       class="">{{ __('Oficjalny numer telefonu klubu *') }}</label>
                                                <input id="phone" type="text"
                                                       class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                       name="phone" value="{{ old('phone') }}"
                                                       placeholder="Wprowadź oficjalny numer telefonu" required
                                                       autofocus>

                                                @if ($errors->has('phone'))
                                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                                @endif
                                            </div>

                                            <div class="col-md-6">
                                                <label for="website_url" style=""
                                                       class="">{{ __('Strona WWW') }}</label>
                                                <input id="website_url" type="text"
                                                       class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                       name="website_url" value="{{ old('website_url') }}"
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
                                                <label for="facebook_url" style=""
                                                       class="">{{ __('Adres do facebooka') }}</label>
                                                <input id="facebook_url" type="text"
                                                       class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                       name="facebook_url" value="{{ old('facebook_url') }}"
                                                       placeholder="Wprowadź adres profilu facebook">

                                                @if ($errors->has('facebook_url'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('facebook_url') }}</strong>
                                                    </span>
                                                @endif
                                            </div>


                                        </div>

                                        {{--<div class="form-group row">--}}
                                            {{--<div class="col-lg-10">--}}
                                                {{--<label for="rules"> Zasady i możliwośći w twoim klubie </label> <br>--}}
                                                {{--@foreach($rules as $rule)--}}

                                                    {{--<div class="form-check form-check-inline">--}}
                                                        {{--<input type="checkbox" name="rules[]" class="form-check-input" value="{{$rule->id}}">--}}
                                                        {{--<label class="form-check-label"> {{$rule->name}}</label>--}}
                                                    {{--</div>--}}


                                                {{--@endforeach--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                        <div class="form-group row">



                                            <div class="col-md-9">
                                                <label for="music_types" style=""
                                                       class="">{{ __('Jaka muzyka jest w Twoim klubie często grana?') }}</label>
                                                <br>

                                                @foreach($musicTypes as $musicType)
                                                    <div class="form-check form-check-inline">
                                                        <input name="music_types[]" class="form-check-input musicTypeCheckbox"
                                                               type="checkbox" id="musicTypeCheckbox"
                                                               value="{{$musicType->id}}">
                                                        <label class="form-check-label"
                                                               for="musicTypeCheckbox">{{$musicType->name}}</label>
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

@section('scripts')
    <script type="text/javascript">
        let loadFile = function (event) {
            let output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endsection
