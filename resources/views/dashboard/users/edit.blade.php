@extends('layouts.app')

@section('content')

    <div class="container">

        @include('layouts.includes.subpages-banner')
        <div class="row justify-content-center">
            @include('dashboard.includes.sidebar')
            <div id="user-profile-form" class="col-md-9">
                <div class="card text-white bg-dark mb-3 ">
                    <div class="card-header pb-0 pt-4">
                        <h3 class="mb-1">Formularz edycji profilu</h3>
                    </div>
                    <div class="card-body pb-4 user-setting-body pt-3">
                        <flash message="{{ session('flash') }}"></flash>
                        @if (Session::has('message'))
                            <div class="alert alert-success">{{ Session::get('message') }}</div>
                        @endif

                        <form action="{{ route( 'user.update.profile' ) }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            {{method_field('PUT')}}

                            <div class="row">
                                <div class="col-md-4 text-center">
                                    @if (!$user->getAvatar->isEmpty())
                                        <img onclick="loadGallery(this)" data-toogle='modal' data-target="#photos"
                                             id="user_image"
                                             src="{{url('/uploads/users/avatars/' . $user->getAvatar->last()->src)}}">
                                    @else
                                        <img id="user_image" class="img-fluid mt-2"
                                             src="{{url('/img/avatar.png' )}}"
                                             alt="{{$user->first_name}} {{$user->last_name}}">
                                    @endif

                                    <button type="button" data-user_id="{{Auth::id()}}" id="remove_user_image"
                                            style="padding: 4px; border: none"
                                            class="myBtn-link myBtn hvr-sweep-to-right mt-2 btn-sm">usuń zdjęcie
                                    </button>
                                </div>

                                <div class="col-md-8">
                                    <div class="form-inline">
                                        <div style="width: 100%;" class="form-group mr-2 p-0">
                                            <div class="col-md-6 pl-0 pr-3">
                                                <input required type="text" name="first_name" style="width: inherit"
                                                       class="form-control" value="{{Auth::user()->first_name}}">
                                                @if ($errors->has('first_name'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('first_name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div style="padding-right: 0px" class="col-md-6 pl-2">
                                                <input required type="text" name="last_name" style="width: inherit"
                                                       class="form-control" value="{{Auth::user()->last_name}}">
                                                @if ($errors->has('last_name'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('last_name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group mt-4">
                                        <textarea name="description" rows="5" class="form-control" type="text"
                                                  placeholder="Krótki opis Ciebie">{{$user->description}}</textarea>
                                        @if ($errors->has('description'))
                                            <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('description') }}</strong>
                                                    </span>
                                        @endif
                                    </div>

                                    <div class="input-group mb-4 col-md-12 mr-0 pr-0 p-0">

                                        <div class="row flex-column mb-0">
                                            <div class="col-md-12">
                                                <p class="mb-2">Zdjęcie profilowe <small>(dozwolone formaty to JPG//PNG/GIF, rozmiar nie powinien przekraczać 5MB)</small></p>
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

                                <div class="col-md-12 mt-5">
                                    <button style="border: none" type="submit"
                                            class="myBtn-link myBtn hvr-sweep-to-right">Zapisz zmiany
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
