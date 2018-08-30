@extends('layouts.app')

@section('content')

    <div class="container">


        @include('layouts.includes.subpages-banner')
        <div class="row justify-content-center">
            @include('dashboard.includes.sidebar')
            <div class="col-md-9">
                <div class="card text-white bg-dark mb-3 ">
                    <div class="card-header pb-0" >
                        <h4 class="mb-0">Edycja profilu</h4>
                    </div>
                    <div  class="card-body pb-3 user-setting-body pt-3" >
                        @if (Session::has('message'))
                            <div class="alert alert-success">{{ Session::get('message') }}</div>
                        @endif


                        <form action="{{ route( 'user.update.profile' ) }}" method="POST">

                            @csrf
                            {{method_field('PUT')}}

                        <div class="row">
                            <div class="col-md-4 text-center">
                                <img onclick="loadGallery(this)" data-toogle = 'modal' data-target="#photos"  id="user_image" src="{{Auth::user()->getUserImage()}}">
                                <button type="button" data-user_id ="{{Auth::id()}}" id="remove_user_image"  style="padding: 4px; border: none" class="myBtn-link myBtn hvr-sweep-to-right mt-2 btn-sm">usuń zdjęcie</button>

                            </div>

                            <div class="col-md-8">
                                <div class="form-inline">
                                        <div style="width: 100%; padding: 0px" class="form-group mr-2">
                                            <div style="padding-left: 0px" class="col-md-6">
                                                <input required type="text" name="first_name" style="width: inherit" class="form-control" value="{{Auth::user()->first_name}}" >
                                                @if ($errors->has('first_name'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('music_types') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div style="padding-right: 0px" class="col-md-6">
                                                <input required  type="text"  name="last_name" style="width: inherit" class="form-control"value="{{Auth::user()->last_name}}" >
                                                @if ($errors->has('last_name'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('last_name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                </div>
                                <div class="form-group mt-4">
                                    <textarea name="description" rows="5" class="form-control" type="text" placeholder="Krótki opis Ciebie">{{$user->description}}</textarea>
                                </div>

                                <div  style="padding-left: 0px;" class="input-group mb-4 col-md-12 mr-0 pr-0">
                                    <div class="input-group-prepend file-input-prepend">
                                        <span onclick="$('#user-image-input').trigger('click')" class="input-group-text">Wybierz swoje zdjęcie</span>
                                    </div>
                                    <div  class="custom-file">
                                        <p class="text-center m-0 pl-4"></p>
                                        <input data-user_id = "{{ Auth::id() }}" type="file" class="custom-file-input" id="user-image-input" name="user-image">

                                    </div>


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


@endsection
