@extends('layouts/app')

@include('layouts.slider')
@section('content')
    @php
        $counter = 1
    @endphp

    <div class="container-fluid" id="clubs-container">

        {{--Vue Component generate nearest events from DB--}}
        <nearest-events>
        </nearest-events>

        {{--Vue Component generate nearest clubs from DB--}}
        <nearest-clubs>
        </nearest-clubs>

        {{--<slider></slider>--}}

        {{--<h3 class="text-center">Kluby w twojej okolicy</h3>--}}

        {{--<div class="card-slider row justify-content-center">--}}
        {{--@foreach($clubs as $club)--}}

        {{--<div data-background='@if(!empty($club->getMain($club->id))) {{url('public/users/'.$club->user_id.'/'.$club->getMain($club->id)->image_path)}} @endif'--}}
        {{--id="{{$counter}}"--}}
        {{--class="card-slide @if($counter == 1) club-prev @elseif($counter == 2) club-center @elseif($counter == 3) club-next @else club-disable @endif "--}}
        {{--style="background-image: url('@if(!empty($club->getMain($club->id))) {{url('public/users/'.$club->user_id.'/'.$club->getMain($club->id)->image_path)}} @else {{url('img/klub1.jpg')}} @endif() ') ">--}}
        {{--<!-- <img class="club-border" src="{{url('img/clubs_border.png')}}"> -->--}}

        {{--<div class="slide-content">--}}
        {{--<div class="pull-right">--}}
        {{--<form id="Like_form" action="#" method="post">--}}

        {{--<fieldset class="rating">--}}
        {{--<input onclick="document.getElementById('Like_form').submit()" type="radio"--}}
        {{--id="star5" name="rating" value="5"/><label class="full" for="star5"--}}
        {{--title="Awesome - 5 stars"></label>--}}

        {{--<input checked onclick="document.getElementById('Like_form').submit()" type="radio"--}}
        {{--id="star4" name="rating" value="4"/><label class="full" for="star4"--}}
        {{--title="Pretty good - 4 stars"></label>--}}

        {{--<input onclick="document.getElementById('Like_form').submit()" type="radio"--}}
        {{--id="star3" name="rating" value="3"/><label class="full" for="star3"--}}
        {{--title="Meh - 3 stars"></label>--}}

        {{--<input onclick="document.getElementById('Like_form').submit()" type="radio"--}}
        {{--id="star2" name="rating" value="2"/><label class="full" for="star2"--}}
        {{--title="Kinda bad - 2 stars"></label>--}}

        {{--<input onclick="document.getElementById('Like_form').submit()" type="radio"--}}
        {{--id="star1" name="rating" value="1"/><label class="full" for="star1"--}}
        {{--title="Sucks big time - 1 star"></label>--}}

        {{--</fieldset>--}}

        {{--</form>--}}
        {{--</div>--}}
        {{--<br>--}}
        {{--<h3 style="margin-top: 50px"> {{$club->official_name}}</h3>--}}
        {{--<h3 id="value" style="font-size: 70px !important;">{{$user->club_percent($club)}}<span--}}
        {{--style="font-size: 20px; font-weight: 200;">% Dla Ciebie</span></h3>--}}
        {{--<!-- <div class="col-lg-12" style="padding: 0px!important; margin-top: 10px;">--}}
        {{--<a style=" font-size: 19px;" onclick="showDiv(this)"> Muzyka <span class="fa fa-angle-down"> </span></a> <br>--}}
        {{--<div id="music" style="display: none;">--}}
        {{--<p style="color: white; font-size: 14px; font-family: Muli; font-weight: 200"> Lorem Ipsum Lorem Ipsum Lorem Ipsum </p>--}}
        {{--<p style="color: white; font-size: 14px; font-family: Muli; font-weight: 200"> Lorem Ipsum Lorem Ipsum Lorem Ipsum </p>--}}
        {{--<p style="color: white; font-size: 14px; font-family: Muli; font-weight: 200"> Lorem Ipsum Lorem Ipsum Lorem Ipsum </p>--}}
        {{--</div>--}}
        {{--</div>--}}

        {{--<div class="col-lg-12" style="padding: 0px!important; margin-top: 10px;">--}}
        {{--<a  style=" font-size: 19px;" onclick="showDiv(this)"> Rozrywka <span class="fa fa-angle-down"></span></a> <br>--}}
        {{--<div id="Entertainment" style="display: none;">--}}
        {{--<p style="color: white; font-size: 14px; font-family: Muli; font-weight: 200"> Lorem Ipsum Lorem Ipsum Lorem Ipsum </p>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-lg-12" style="padding: 0px!important;margin-top: 10px;">--}}
        {{--<a style=" font-size: 19px;" onclick="showDiv(this)"> Jedznie i napoje <span class="fa fa-angle-down"> </span></a> <br>--}}
        {{--<div id="food" style="display: none;">--}}
        {{--<p style="color: white; font-size: 14px; font-family: Muli; font-weight: 200"> Lorem Ipsum Lorem Ipsum Lorem Ipsum </p>--}}
        {{--</div>--}}
        {{--</div> -->--}}

        {{--</div>--}}


        {{--</div>--}}
        {{--@php--}}
        {{--$counter++;--}}
        {{--@endphp--}}
        {{--@endforeach--}}


        {{--</div>--}}


        {{--<div class="nav-button">--}}
        {{--<div onclick="prev()" class="prev-button"><a><i class="fa fa-caret-left"></i></a></div>--}}
        {{--<div onclick="next()" class="next-button"><a><i class="fa fa-caret-right"></i></a></div>--}}
        {{--</div>--}}


        {{--</div>--}}


        <div class="container" style="" id="events">
            <div class="row justify-content-center">
                <div class="col-lg-auto" style="margin-top: 100px; margin-bottom: 100px;">
                    <h3 class="text-right" style="font-weight: 200; right: 25%; font-size: 40px;">WYDARZENIA</h3>
                    <h3 stclass=" text-center">NADCHODZĄCE DATY</h3>
                </div>
            </div>
            <div class="row justify-content-center">
                <div id="event-carousel" class="carousel carousel-events slide carousel-fade" data-ride="carousel">
                    <div class="carousel-inner">
                        @php
                            $counter = 1;
                            $site = 1;
                        @endphp
                        @for($i=1; $i<=count($events)/3; $i++)

                            <div class="carousel-item @if($i == 1) active @endif ">
                                <div class="row justify-content-center">
                                    @for($j=1; $j<=3; $j++)
                                        @php $event = $events[$counter-1];@endphp
                                        <div class="col-lg-4 event"
                                             id="@if($j == 1) event-left @elseif($j == 3) event-right @endif">
                                            <img src="{{url('img/square_events.png')}}">
                                            <div class="row"
                                                 onmouseover="this.childNodes[1].childNodes[1].style.color = 'rgb(239, 58, 177)';"
                                                 onmouseleave="this.childNodes[1].childNodes[1].style.color = 'white';">
                                                <div class="col-lg-3">
                                                    <h1 style=" margin: 0px; @if($counter>9) font-size: 50px !important; margin-top: 35% !important; @endif"> {{$counter}}
                                                        . </h1>
                                                </div>
                                                <div class="col-lg-9">
                                                    <p id="event-name">{{$event->title}}</p>
                                                    <p id="event-date">{{substr($event->start_date,0,10)}} <span
                                                                class="pull-right">{{rand(200,9000)}} osób</span></p>

                                                </div>
                                            </div>
                                            <div id="event-article" class="col-lg-12 " style="; padding: 0px;">
                                                <article>
                                                    {{$event->description}}
                                                </article>

                                            </div>
                                            <a style=" font-size: 20px;"
                                               class="mt-3 myBtn-link myBtn hvr-sweep-to-right animated fadeIn">Zobacz
                                                wiecej</a>
                                        </div>
                                        @php $counter++; @endphp
                                    @endfor

                                </div>

                            </div>

                        @endfor

                    </div>

                    <a class="carousel-control-prev " href="#event-carousel" data-slide="prev"
                       style="font-size:4em; color:black; z-index: 1; left: -11%; top:0px !important;">
                        <span class="carousel-control fa fa-caret-left fa-sm"></span>
                    </a>
                    <a class="carousel-control-next " href="#event-carousel" data-slide="next"
                       style="font-size:4em; color:black; z-index: 1; right: -11%; top:0px !important;">
                        <span class="carousel-control fa fa-caret-right fa-sm"></span>
                    </a>

                </div>

            </div>
        </div>


    </div>

@endsection

<!--
  <div class="carousel-item active row justify-content-center"  >


    </div> -->
