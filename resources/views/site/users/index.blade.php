@extends('layouts.app')

@section('content')

    <div class="container">


        @include('site.clubs.includes.search')

        <div class="row justify-content-center mt-4 mb-3">
            <h1 class="text-center text-white">Użytkownicy portalu</h1>
        </div>

        <div class="row justify-content-center mt-2 mb-5">
            @foreach($users as $user)
                @if(! $user->hasRole('admin') || $user->hasRole('manager'))
                <div class="col-4 col-md-3 m-0 p-2">
                    <a href="" class="d-block bg-dark ">
                        @if (!$user->getAvatar->isEmpty())
                            <img id="user_image"
                                 src="{{url('/uploads/users/avatars/' . $user->getAvatar->last()->src)}}">
                        @else
                            <img id="user_image" class="img-fluid"
                                 src="{{url('/img/avatar.png' )}}"
                                 alt="{{$user->first_name}} {{$user->last_name}}">
                        @endif
                        <div class="text-white text-center p-2">
                            <h5>{{$user->first_name . ' ' . $user->last_name}}</h5>
                            <h5 class="text-center mt-2">
                                <small>
                                    <span class="badge-secondary p-1 mt-1 text-center">
                                        @if($user->hasRole('owner'))
                                            właściciel
                                        @else
                                            użytkownik
                                        @endif
                                    </span>
                                </small>
                            </h5>
                        </div>
                    </a>
                </div>
                @endif
            @endforeach
        </div>


    </div>


@endsection

