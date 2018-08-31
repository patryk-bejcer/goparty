@extends('layouts.app')

@section('content')

    <div class="container">

        @include('layouts.includes.subpages-banner')

        <div class="row justify-content-center flex-column-reverse flex-md-row">

            @include('dashboard.includes.sidebar')

            <div id="user-profile-form" class="col-md-9">
                <div class="card text-white bg-dark mb-3 ">
                    <div class="card-header pb-0 pt-4">
                        <h3 class="mb-1 text-center text-md-left">Formularz edycji profilu</h3>
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
                                        <img id="user_image"
                                             src="{{url('/uploads/users/avatars/' . $user->getAvatar->last()->src)}}">

                                        <button type="button" id="remove_user_image"
                                                style="border: none"
                                                class="myBtn-link myBtn hvr-sweep-to-right mt-2 btn-sm p-2"
                                                onclick="document.getElementById('remove-avatar-form').submit();">
                                            usuń avatar
                                        </button>

                                    @else
                                        <img id="user_image" class="img-fluid mt-2"
                                             src="{{url('/img/avatar.png' )}}"
                                             alt="{{$user->first_name}} {{$user->last_name}}">
                                    @endif

                                </div>

                                <div class="col-md-8">
                                    <div class="form-inline">
                                        <div  class="form-group mr-0 mr-md-2 mt-3 mt-md-0 p-0 w-100">
                                            <div class="col col-md-6 pl-0 pr-0 pr-md-3">
                                                <label class="w-100">
                                                    <input required type="text" name="first_name"
                                                           class="form-control w-100"
                                                           value="{{Auth::user()->first_name}}">
                                                </label>
                                                @if ($errors->has('first_name'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('first_name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="col-md-6 mt-3 mt-md-0 p-0 pl-0 pl-md-2">
                                                <label class="w-100">
                                                    <input required type="text" name="last_name"
                                                           class="form-control w-100"
                                                           value="{{Auth::user()->last_name}}">
                                                </label>
                                                @if ($errors->has('last_name'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('last_name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group mt-0 mt-md-4">
                                        <textarea name="description" rows="5" class="form-control" type="text"
                                                  placeholder="Krótki opis Ciebie">{{$user->description}}</textarea>
                                        @if ($errors->has('description'))
                                            <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('description') }}</strong>
                                                    </span>
                                        @endif
                                    </div>

                                    <div class="input-group mb-3 mb-md-4 col-md-12 mr-0 pr-0 p-0">

                                        <div class="row flex-column mb-0">
                                            <div class="col-md-12">
                                                <p class="mb-2">Zdjęcie profilowe <br>
                                                    <small>(dozwolone formaty to JPG//PNG/GIF, rozmiar nie powinien
                                                        przekraczać 5MB)
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

                                <div class="col-md-12 mt-0 mt-md-4 ">
                                    <button style="border: none" type="submit"
                                            class="myBtn-link myBtn hvr-sweep-to-right">Zapisz zmiany
                                    </button>
                                </div>

                            </div>
                        </form>

                        <form id="remove-avatar-form" action="{{ route( 'user.remove.avatar' ) }}" method="POST">
                            @csrf
                            {{method_field('DELETE')}}
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

