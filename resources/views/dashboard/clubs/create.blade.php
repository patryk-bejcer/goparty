@extends('layouts.app')

{!! NoCaptcha::renderJs() !!}

@section('content')

    <div class="container">

        @include('layouts.includes.subpages-banner')
        <div class="row justify-content-center">
            @include('dashboard.includes.sidebar')
            <div class="col-md-9">
                <div class="card text-white bg-dark mb-3">

                    <div class="card-body">

                        <div id="register-club" class="">
                            <div class="pb-2 pt-1">

                                <div class="card-body pt-0 text-white">
                                    <form method="POST" action="{{ route('clubs.store') }}"
                                          enctype="multipart/form-data">

                                        @csrf

                                        @if(!empty($errors->first()))
                                            <div class="row col-lg-12">
                                                <div class="alert alert-danger">
                                                    <span>{{ $errors->first() }}</span>
                                                </div>
                                            </div>
                                        @endif

                                        <h3 class="mb-1">Zamieść informacje o klubie w serwisie GoToParty</h3>
                                        <a href="#"> Proszę przeczytać zasady strony GoToParty dotyczące klubu.</a>
                                        <hr>

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

                                        <div class="form-group row mt-5">

                                            <div class="col-md-12">
                                                <h3>Infomacje odnośnie lokalizacji</h3>
                                            </div>

                                            <!--  VUE COMPONENT SEARCH BOX ADDRESS -->
                                            <address-search-box :ismap=true></address-search-box>
                                            <!--  END VUE COMPONENT -->


                                            <div class="col-md-6">

                                                <label for="additional_address_info" style=""
                                                       class="mb-1">{{ __('Dodatkowe informacje adresowe') }}</label>
                                                <textarea rows="4" id="additional_address_info" type="text"
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

                                        <div class="form-group row mt-5">

                                            <div class="col-md-12">
                                                <h3>Infomacje kontaktowe</h3>
                                            </div>

                                            {{--<label for="official_name" class="col-md-2 col-form-label text-md-right">{{ __('First name') }}</label>--}}
                                            <div class="col-md-6">
                                                <label for="phone" style=""
                                                       class="">{{ __('Oficjalny numer telefonu klubu *') }}</label>
                                                <input id="phone" type="text"
                                                       class="form-control mt-1 {{ $errors->has('name') ? ' is-invalid' : '' }}"
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
                                                <label for="fax" style=""
                                                       class="">{{ __('Faks') }}</label>
                                                <input id="fax" type="text"
                                                       class="form-control mt-1 {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                       name="fax" value="{{ old('fax') }}"
                                                       placeholder="Wprowadź oficjalny numer telefonu"
                                                       autofocus>

                                                @if ($errors->has('fax'))
                                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('fax') }}</strong>
                                    </span>
                                                @endif
                                            </div>

                                            <div class="col-md-6 mt-2">
                                                <label for="website_url" style=""
                                                       class="">{{ __('Adres Państwa witryny') }}</label>
                                                <input id="website_url" type="text"
                                                       class="form-control mt-1 {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                       name="website_url" value="{{ old('website_url') }}"
                                                       placeholder="Wprowadź adres strony www">

                                                @if ($errors->has('website_url'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('website_url') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="col-md-6 mt-2">
                                                <label for="facebook_url" style=""
                                                       class="">{{ __('Strona w serwisie Facebook') }}</label>
                                                <input id="facebook_url" type="text"
                                                       class="form-control mt-1 {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                       name="facebook_url" value="{{ old('facebook_url') }}"
                                                       placeholder="Wprowadź adres profilu facebook">

                                                @if ($errors->has('facebook_url'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('facebook_url') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            {{--<label for="official_name" class="col-md-2 col-form-label text-md-right">{{ __('First name') }}</label>--}}


                                        </div>

                                        <div class="form-group row mt-5">

                                            <div class="col-md-12">
                                                <h3>Opis Twojego klubu</h3>
                                                <p class="mb-2">limit to 400 znaków</p>
                                            </div>

                                            <div class="col-12 col-md-9">
                                                <textarea rows="4" id="additional_address_info" type="text"
                                                          class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                          name="description"
                                                          value="{{ old('additional_address_info') }}"
                                                          placeholder="Wprowadź dotatkowe informacje adresowe (wskazówki dojazdu itp.)"></textarea>
                                            </div>

                                        </div>


                                        <div class="form-group row mt-5">

                                            <div class="col-md-12">
                                                <h3>Informacje o klubie</h3>
                                                <p class="mb-2">Czy ten klub oferuje dowolne z następujących
                                                    udogodnień?</p>
                                            </div>

                                            <div class="col-md-3 pl-3">
                                                @foreach($facilities as $facility)
                                                    <div class="custom-control custom-checkbox">
                                                        <input name="facilities[]" type="checkbox"
                                                               value="{{$facility->id}}" class="custom-control-input"
                                                               id="facility_{{$facility->id}}">
                                                        <label class="custom-control-label"
                                                               for="facility_{{$facility->id}}">{{$facility->name}}</label>
                                                    </div>
                                                @endforeach
                                            </div>

                                        </div>

                                        <div class="form-group row mt-5">
                                            <div class="col-md-9">
                                                <h3>Muzyka</h3>
                                                <label for="music_types" style=""
                                                       class="mb-2">{{ __('Jaka muzyka jest w Twoim klubie często grana?') }}</label>
                                                <br>

                                                @foreach($musicTypes as $musicType)
                                                    <div class="custom-control custom-checkbox">
                                                        <input name="music_types[]" type="checkbox"
                                                               value="{{$musicType->id}}" class="custom-control-input"
                                                               id="musicType_{{$musicType->id}}">
                                                        <label class="custom-control-label"
                                                               for="musicType_{{$musicType->id}}">{{$musicType->name}}</label>
                                                    </div>
                                                @endforeach

                                                @if ($errors->has('music_types'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('music_types') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row d-flex align-self-center mt-5">
                                            <div class="col-8">
                                                <div class="input-group mb-3 mb-md-4 col-md-12 mr-0 pr-0 p-0">

                                                    <div class="row mb-0">
                                                        <div class="col-md-12">
                                                            <h3 class="mb-1">Wybierz zdjęcie klubu </h3>
                                                            <p class="mb-1">
                                                                <small>dozwolone formaty to JPG//PNG/GIF, rozmiar nie
                                                                    powinien
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
                                                {!! NoCaptcha::display() !!}
                                                @if ($errors->has('g-recaptcha-response'))
                                                    <span class="invalid-feedback">
                                                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                                            </span>
                                                @endif
                                            </div>
                                            <div class="col-12 d-flex align-self-end justify-content-end">
                                                <div class="form-group row mb-0">
                                                    <div class="col-md-6">

                                                        <button type="submit" class="btn btn-primary">
                                                            {{ __('Dalej >>') }}
                                                        </button>
                                                    </div>
                                                </div>
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
