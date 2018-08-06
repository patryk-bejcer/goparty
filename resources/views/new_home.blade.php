@extends('layouts/app')

@section('content')
    @php
        $counter = 1

    @endphp



    <div id="clubs-container" class="container">



        {{--Vue Component generate nearest events from DB--}}
        <nearest-events>
        </nearest-events>

        {{--Vue Component generate nearest clubs from DB--}}
        <nearest-clubs>
        </nearest-clubs>


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

@section('scripts')
    <script>

    </script>
@endsection