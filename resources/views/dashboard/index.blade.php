@extends('layouts.app')

@section('content')

    <div class="container">


        @include('layouts.includes.subpages-banner')
        <div class="row justify-content-center">
            @include('dashboard.includes.sidebar')
            <div class="col-md-9">
                <div class="card text-white bg-dark mb-3">
                    <div class="card-header" >
                        <b>Witaj w panelu użytkownika</b>
                    </div>
                    <div  class="card-body pb-5 user-setting-body" >
                        @if (Session::has('message'))
                            <div class="alert alert-success">{{ Session::get('message') }}</div>
                        @endif

                      <div  style="padding-left: 0px;" class="input-group mb-4 col-md-9">
                            <div class="input-group-prepend file-input-prepend">
                                <span onclick="$('#user-image-input').trigger('click')" class="input-group-text">Wybierz swoje zdjęcie</span>
                            </div>
                            <div  class="custom-file">
                                <p class="text-center m-0 pl-4"></p>
                                <input data-user_id = "{{\Illuminate\Support\Facades\Auth::id()}}" type="file" class="custom-file-input" id="user-image-input" name="user-image">

                            </div>
                          

                      </div>
                        <form  action="{{route('user_update', ['user' => \Illuminate\Support\Facades\Auth::user()])}}" method="POST">
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <img onclick="loadGallery(this)" data-toogle = 'modal' data-target="#photos"  id="user_image" src="{{\Illuminate\Support\Facades\Auth::user()->getUserImage()}}">
                                <button type="button" data-user_id ="{{\Illuminate\Support\Facades\Auth::id()}}" id="remove_user_image"  style="padding: 4px; border: none" class="myBtn-link myBtn hvr-sweep-to-right mt-2 btn-sm">usuń zdjęcie</button>

                            </div>

                                @CSRF


                            <div class="col-md-8">
                                <div class="form-inline">
                                        <div style="width: 100%; padding: 0px" class="form-group mr-2">
                                            <div style="padding-left: 0px" class="col-md-6">
                                                <input required type="text" name="first_name" style="width: inherit" class="form-control" value="{{\Illuminate\Support\Facades\Auth::user()->first_name}}" >
                                                @if ($errors->has('first_name'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('music_types') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div style="padding-right: 0px" class="col-md-6">
                                                <input required  type="text"  name="last_name" style="width: inherit" class="form-control"value="{{\Illuminate\Support\Facades\Auth::user()->last_name}}" >
                                                @if ($errors->has('last_name'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('last_name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                </div>
                                <div class="form-group mt-4">
                                    <textarea name="description" rows="6" class="form-control" type="text" placeholder="Krótki opis Ciebie"> </textarea>
                                </div>
                                <div class="form-group mt-4">
                                    <select name="city" class="custom-select">
                                        @foreach($cities as $city)
                                            <option @if(\Illuminate\Support\Facades\Auth::user()->city_id == $city->id) selected @endif class="option-item" value="{{$city->id}}"> {{$city->name}}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12 mt-3">
                                <label for="music_types" style=""
                                       class="">{{ __('Wybierz muzkę jaką lubisz słuchać?') }}</label>
                                <br>

                                @foreach($musicTypes as $musicType)
                                    <div class="form-check form-check-inline">
                                        <input @if(in_array($musicType, \Illuminate\Support\Facades\Auth::user()->getMusicTypes())) checked  @endif name="music_types[]" class="form-check-input musicTypeCheckbox"
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

                            <div class="col-md-12 mt-3 distance">
                                <div class="row justify-content-md-between mb-2">
                                    <div class="col-1" style="max-width: 11% !important; flex: none">
                                        <label class="text-center m-auto"  for="distance-min-output">min: </label>
                                         <input class="form-control" id="distance-min-output" name="distance_min" type="text"  @if(($min_dist = \Illuminate\Support\Facades\Auth::user()->getUserSettings()->distance_min)!=null) value = "{{$min_dist}}" @else value="0" @endif>

                                    </div>
                                    <div class=" text-center" style="padding: 1rem">
                                        <p class="m-0">Preferencje odległości od wyszukiwanych klubów (km) </p>
                                    </div>
                                    <div class="col-1" style="max-width: 11% !important; flex: none ">
                                        <label class="text-center m-auto"  for="distance-max-output">max: </label>
                                          <input id="distance-max-output" name="distance_max" type="text"  @if(($max_dist = \Illuminate\Support\Facades\Auth::user()->getUserSettings()->distance_max)!=null) value = "{{$max_dist}}" @else value="0" @endif>
                                    </div>
                                </div>

                                <div class="slider" id="distance-slider"></div>
                            </div>

                            <div class="col-md-12 mt-4">
                                <div class="col-md-12 text-center">
                                    <p class="m-0 p-2">Minimalna ocena klubu:</p>
                                </div>
                                <div class="slider" id="min_club_rate_slider">

                                    <div id="custom-handle" class="ui-slider-handle"></div>
                                </div>

                            </div>
                            <div class="col-md-12 mt-3">
                                <button style="border: none" type="submit" class="myBtn-link myBtn hvr-sweep-to-right">Zapisz</button>
                            </div>

                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="photos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">


            <img id = "modal-photo" src="{{url('img/klub1.jpg')}}">



        </div>
        <button id="modal-button" id="modal-button" type="button" class="btn btn-secondary" data-dismiss="modal">X</button>

    </div>
@endsection
