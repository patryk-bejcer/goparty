@extends('layouts.app')

@section('content')

    <div class="container">

        @include('layouts.includes.subpages-banner')
        <div class="row justify-content-center">
            @include('dashboard.includes.sidebar')

            @if(isset($flash))
                {{$flash}}
                <flash message="{{$flash}}"></flash>
            @endif

            <div class="col-md-9">
                <div class="card text-white bg-dark mb-3">
                    <div class="card-header pl-4 pt-3">
                        <div class="col-12">
                            <h4>Edycja klubu {{$club->official_name }}</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="register-club" class="">
                            <div class="pb-5 pt-1">

                                <div class="card-body pt-0 text-white">
                                    <form method="POST" action="{{ route('clubs.update', ['id' => $club->id ]) }}"
                                          id="club_edit_form" enctype="multipart/form-data">

                                        @csrf
                                        {{method_field('PUT')}}

                                        @if(!empty($errors->first()))
                                            <div class="row col-lg-12">
                                                <div class="alert alert-danger">
                                                    <span>{{ $errors->first() }}</span>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="form-group row">

                                            <div class="col-md-6">
                                                <label for="city" style=""
                                                       class="">{{ __('Pełna nazwa klubu *') }}</label>
                                                <input id="official_name" type="text"
                                                       class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                       name="official_name" value="{{ $club->official_name  }}"
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
                                            <div class="col-md-6">
                                                <label for="email" style=""
                                                       class="">{{ __('Oficjalny aders E-mail *') }}</label>
                                                <input id="email" type="email"
                                                       class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
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
                                                <h2 class="pb-3">Infomacje odnośnie lokalizacji</h2>
                                            </div>

                                            <!--  VUE COMPONENT SEARCH BOX ADDRESS -->
                                            <address-search-box
                                                    :fulladdress='{{ json_encode( $club->route . ' ' . $club->street_number . ', ' . $club->locality . ', ' . $club->country) }}'
                                                    :ismap=true
                                                    :latform="{{$club->latitude}}"
                                                    :lngform="{{$club->longitude}}">
                                            </address-search-box>
                                            <!--  END VUE COMPONENT -->

                                            <div class="col-md-6">


                                                <label for="additional_address_info" style=""
                                                       class="mb-1">{{ __('Dodatkowe informacje adresowe') }}</label>
                                                <textarea rows="7" id="additional_address_info" type="text"
                                                          class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
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
                                                <label for="phone" style=""
                                                       class="">{{ __('Oficjalny numer telefonu klubu *') }}</label>
                                                <input id="phone" type="text"
                                                       class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                       name="phone" value="{{ $club->phone  }}"
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
                                                <label for="facebook_url" style=""
                                                       class="">{{ __('Adres do facebooka') }}</label>
                                                <input id="facebook_url" type="text"
                                                       class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                       name="facebook_url" value="{{ $club->facebook_url  }}"
                                                       placeholder="Wprowadź adres profilu facebook">

                                                @if ($errors->has('facebook_url'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('facebook_url') }}</strong>
                                                    </span>
                                                @endif
                                            </div>


                                        </div>

                                        <div class="form-group row mt-5">

                                            <div class="col-md-12">
                                                <h3>Informacje o klubie</h3>
                                                <p class="mb-2">Czy ten klub oferuje dowolne z następujących
                                                    udogodnień?</p>
                                            </div>

                                            <div class="col-md-9 ml-4">

                                                @foreach($facilities as $facility)
                                                    <div class="custom-control-inline custom-checkbox pr-4 pl-1 mb-2">
                                                        <input name="facilities[]"
                                                               type="checkbox"
                                                               value="{{$facility->id}}" class="custom-control-input"
                                                               id="facility_{{$facility->id}}"

                                                               {{ \App\Services\Helper::checkIfCheckboxIsChecked($club->facilities, $facility) }}
                                                        >
                                                        <label class="custom-control-label"
                                                               for="facility_{{$facility->id}}">{{$facility->name}}</label>
                                                    </div>
                                                @endforeach
                                            </div>

                                        </div>

                                        <div class="form-group row mt-5 mb-5">
                                            <div class="col-md-9">
                                                <h3>Muzyka</h3>
                                                <label for="music_types" style=""
                                                       class="mb-2">{{ __('Jaka muzyka jest w Twoim klubie często grana?') }}</label>
                                                <br>

                                                <div class="ml-4">
                                                    @foreach($musicTypes as $musicType)
                                                        <div class="custom-control-inline custom-checkbox pr-4 pl-1 mb-2">
                                                            <input name="music_types[]" type="checkbox"
                                                                   value="{{$musicType->id}}"
                                                                   class="custom-control-input"
                                                                   id="musicType_{{$musicType->id}}"

                                                                   {{ \App\Services\Helper::checkIfCheckboxIsChecked($club->musics, $musicType) }}
                                                            >
                                                            <label class="custom-control-label"
                                                                   for="musicType_{{$musicType->id}}">{{$musicType->name}}</label>
                                                        </div>
                                                    @endforeach
                                                </div>

                                                @if ($errors->has('music_types'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('music_types') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row mt-5 mb-5">
                                            <div class="col-md-9">
                                                <h3>Zdjęcie</h3>
                                                <label for="music_types" style=""
                                                       class="mb-2">{{ __('Aktualne zdjęcie klubu') }}</label>

                                                <div class="input-group mb-3 mb-md-4 col-md-12 mr-0 pr-0 p-0">

                                                    <div class="row flex-column mb-0">
                                                        <div class="col-md-12">
                                                            @if (!$club->primaryImage->isEmpty())
                                                                <img style="max-height: 320px; width: auto !important;"
                                                                     class="mb-2"
                                                                     src="{{url('/uploads/clubs/' . $club->primaryImage->last()->src)}}"
                                                                     alt="">
                                                            @endif
                                                            <p class="mb-2">
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
                                            </div>
                                        </div>


                                        <div class="form-group row mb-0">
                                            <div class="col-md-6" style="display: inline-flex">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Dalej >>') }}
                                                </button>
                                                <a href="{{url('clubs/'. $club->id)}}" class="ml-4 btn btn-primary">Zobacz
                                                    ten klub</a>
                                            </div>
                                        </div>
                                    </form>

                                    <form method="POST" action="{{ route('clubs.destroy', ['id' => $club->id ]) }}">

                                        @csrf
                                        {{method_field('DELETE')}}

                                        <input type="submit" class="text-danger pull-right" value="Usuń klub">

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
