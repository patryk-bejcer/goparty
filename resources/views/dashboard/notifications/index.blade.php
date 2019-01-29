@extends('layouts.app')

@section('content')

    <div class="container">

        @include('layouts.includes.subpages-banner')

        <div class="row justify-content-center flex-column-reverse flex-md-row">

            @include('dashboard.includes.sidebar')


            <section class="notification-card col-12 col-md-9 justify-content-center align-items-lg-stretch">
                <div class="inner bg-dark p-3 pb-5">
                    <div class="row justify-content-center p-3">
                        <i class="fa fa-bell pr-2" aria-hidden="true"></i>
                        <h4>Twoje powiadomienia ({{Auth::user()->notifications->count()}})</h4>

                    </div>

                    @foreach(Auth::user()->notifications as $notification)
                        <div class="notification pl-2 pr-3 ml-2 mr-2">
                            <div class="row">
                                <div class="col-11">
                                    {!!$notification->data['message']!!} <br>
                                    <small>{{$notification->created_at}}</small>
                                </div>
                                {{--<div class="col-1">--}}
                                    {{--<a class="pull-right pr-1" href=""><i class="fa fa-trash" aria-hidden="true"></i></a>--}}
                                {{--</div>--}}
                            </div>
                        </div>
                    @endforeach

                </div>
        </div>


    </div>


@endsection

