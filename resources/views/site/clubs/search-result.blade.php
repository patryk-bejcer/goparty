@extends('layouts.app')

@section('content')

    <div class="container">


        @include('site.clubs.includes.search')


        <div id="clubs-list" class="mt-4 pt-4">

            <div class="card-columns">

                @foreach($clubs as $club)
                    <a href="{{ url('/clubs/' . $club->id)  }}">
                        <div class="card mb-4 pb-4">
                            {{--<div class="card-header">--}}
                            {{--Card Header--}}
                            {{--</div>--}}
                            <img class="card-img-top" src="@if($club->club_img) {{ url('/uploads/clubs/' . $club->club_img )  }} @else http://www.clubcoco.pl/assets/reservations/floor2.png @endif " alt="Card image top">
                            <div class="card-body">
                                <a href="{{ url('/clubs/' . $club->id)  }}"><h4
                                            class="text-white">{{$club->official_name}}</h4></a>
                                <h6><i class="fa fa-map-marker pt-1"
                                       aria-hidden="true"></i>
                                    {{$club->route }}, {{$club->locality }}</h6>
                                <p class="mb-1">
                                    @if($club->ticket_price) Wstęp od: {{$club->admission}} + @else Wstęp dla
                                    każdego @endif |
                                    @if($club->ticket_price) Cena biletu: {{$club->ticket_price}}zł @else <span
                                            class="text-success">Darmowy wstęp</span> @endif
                                    <br>
                                    Selekcja: @if($club->selection) Tak @else Nie @endif</p>
                                <p>{{ str_limit($club->description, $limit = 120, $end = '...') }}</p>

                            </div>

                        </div>
                    </a>
                @endforeach


            </div>
        </div>

        {{ $clubs->links() }}

    </div>


@endsection

