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
                        @if (Session::has('message'))
                            <div class="alert alert-success">{{ Session::get('message') }}</div>
                        @endif
                        <div id="register-club" class="">
                            <div class="pb-5 pt-1">

                                <div class="card-body pt-0 text-white">
                                    <form method="POST" action="{{ route('clubs.update', ['id' => $club->id ]) }}" id="club_edit_form">

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
                                            <address-search-box :ismap=true
                                                                :latform={{$club->latitude}} :lngform={{$club->longitude}} :fulladdress={{$club->route}}>
                                            </address-search-box>
                                            <!--  END VUE COMPONENT -->

                                            <div class="col-md-6">
                                                <label for="additional_address_info" style=""
                                                       class="">{{ __('Dodatkowe informacje adresowe') }}</label>
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

                                        <div class="form-group row justify-content-center " id="clubImageDiv">
                                            <div class="col=md-2 " style=" background-color: #0b2e13; margin-bottom: 10px;" >

                                                <a  onclick="$('#image').click()" class="btn btn-md btn-primary" style="margin: 0px !important; display: block;  padding: 7px; font-size: 14px; letter-spacing: 1px;"> Dodaj zdjęcie </a>
                                                <input id="image" name="image" type="file" style="display: none" data-clubid = '{{$club->id}}' data-userid="{{$club->user->id}}">

                                            </div>


                                            <div class="col-md-10 justify-content-center" style=" border: 1px; border-color: white; border-style: solid; margin: auto;" id="image-place">

                                    @if($images->isEmpty())
                                                <p class="text-center">Ten Klub nie ma jeszcze żadnych zdjęć</p>
                                        @endif

                                                    @foreach($images as $image)


                                                    <div class="image_div">
                                                             <img src="{{url('public/users/'. $image->user_id . '/'. $image->image_path)}}">
                                                             <div class="button">
                                                                 <div class="checkbox">
                                                                     <label for="active">aktywne</label>

                                                                     <input onclick="change_active(this)" data-image_id = '{{$image->id}}' type="checkbox" name="active" @if($image->active == 1) checked @endif>

                                                                 </div>
                                                                 <div class="checkbox">
                                                                     <label for="active">główne</label>
                                                                     <input onclick="change_main(this)" data-image_id = '{{$image->id}}' type="checkbox" name="main" @if($image->main == 1)checked @endif>

                                                                 </div>

                                                                 <a onclick="delete_club_image(this)" data-clubImageId = '{{$image->id}}'>usun</a>
                                                             </div>

                                                        </div>
                                                                @endforeach




                                                    </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-lg-10">
                                                <label for="rules"> Zasady i możliwośći w twoim klubie </label> <br>
                                                @foreach($rules as $rule)

                                                    <div class="form-check form-check-inline">
                                                        <input @if(in_array($rule, $club->rule())) checked  @endif type="checkbox" name="rules[]" class="form-check-input" value="{{$rule->id}}">
                                                        <label class="form-check-label"> {{$rule->name}}</label>
                                                    </div>


                                                    @endforeach
                                            </div>
                                        </div>

                                        <div class="form-group row">

                                            <div class="col-md-10">
                                                <label for="music_types" style=""
                                                       class="">{{ __('Jaka muzyka jest w Twoim klubie często grana?') }}</label>
                                                <br>


                                                @foreach($musicTypes as $musicType)

                                                    <div class="form-check form-check-inline">
                                                        <input @if(in_array($musicType, $club->music_types)) checked @endif name="music_types[]" class="form-check-input musicTypeCheckbox"
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
                                            <div class="col-md-6" style="display: inline-flex">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Dalej >>') }}
                                                </button>
                                                <a href="{{url('clubs/'. $club->id)}}" class="ml-4 btn btn-primary">Zobacz ten klub</a>
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
