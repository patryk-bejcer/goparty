@extends('layouts.app')

@section('title', $club->official_name)

@section('content')

    <clubs-header></clubs-header>

    <div class="images-controls">
        <div class="next-club ">
            <a href="{{url('/clubs/' . $club->id . '/next')}}">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
            </a>
        </div>
        <div class="prev-club">
            <a href="{{url('/clubs/' . $club->id . '/prev')}}">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </a>
        </div>
    </div>

    <div class="container mt-4 pl-0">

        <nav aria-label="breadcrumb" class="mt-2">
            <ol class="breadcrumb pl-0">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Strona główna</a></li>

                <li class="breadcrumb-item"><a href="{{url('clubs#clubs')}}">
                        Wszystkie Kluby
                    </a></li>

                <li class="breadcrumb-item active" aria-current="page">{{$club->official_name}}</li>
            </ol>
        </nav>

    </div>

    <div class="container" style=" padding: 0px; margin-top: 0px;" id="single_club"
         data-scroll='scroll'>

        <div class="row justify-content-center">

            {{--<div class="club-border"></div>--}}
            <div class="col-lg-5">
                <img class="img-fluid"
                     src="@if($club->club_img) {{ url('/uploads/clubs/' . $club->club_img )  }} @else {{url('/img/default-event-img.jpg')}} @endif "
                     alt="">
                {{--@if(empty($club->getMain($club->id)))--}}
                {{--<p>Ten klub nie ma jeszcze dodanych zdjęć</p>--}}
                {{--@else--}}
                {{--<img onclick="loadGallery(this)" data-toogle = 'modal' data-target="#photos" id="img-gallery" src="{{url('public/users/'.$club->user_id.'/'.$club->getMain($club->id)->image_path)}}">--}}
                {{--@endif--}}
                @if (empty($club->getPhotos($club, 3)))

                @else

                    <div class="row" id="other-image">
                        @foreach($club->getPhotos($club, 3) as $photo)
                            <div class="col-lg-4">
                                <img onclick="loadGallery(this)" id="img-gallery"
                                     src="{{url('public/users/'.$photo->user_id.'/'.$photo->image_path)}}">
                            </div>

                        @endforeach

                    </div>
                @endif
            </div>

            <div class="col-lg-7" style="padding-top: 0px;">
                <h2 style="margin-top: 0px;" class="text-center">{{$club->official_name}}</h2>
                <hr>
                <p id="description">
                    Lorem Ipsum jest tekstem stosowanym jako przykładowy wypełniacz w przemyśle poligraficznym. Został
                    po raz pierwszy użyty w XV w. przez nieznanego drukarza do wypełnienia tekstem próbnej książki. Pięć
                    wieków później zaczął być używany przemyśle elektronicznym, pozostając praktycznie niezmienionym.
                    Spopularyzował się w latach 60. XX w. wraz z publikacją arkuszy Letrasetu, zawierających fragmenty
                    Lorem Ipsum, a ostatnio z zawierającym różne wersje Lorem Ipsum oprogramowaniem przeznaczonym do
                    realizacji druków na komputerach osobistych, jak Aldus PageMaker
                </p>
            </div>
        </div>

        <div class="club-info mb-5">
            <div class="row mt-5">
                <div class="col">
                    <h3 class="text-center mb-0">Informacje o klubie</h3>
                </div>
            </div>
            <hr>
            <div class="d-flex justify-content-between text-white mb-5">
                <div class="col-4">
                    <div class="rate">
                        <div class="d-flex align-items-center">
                            <div>
                                <span class="number-rate">4,5</span>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-half-o" aria-hidden="true"></i>
                            </div>
                            <div class="">
                                <span class="number-of-rate pull-right text-sm text-right pl-4"><a href="">Liczba opini: 142</a></span>
                            </div>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum debitis dolorum et hic illum
                            impedit libero minima minus molestiae, nam, non quia recusandae repellat sed sunt veritatis
                            voluptatem? Possimus, quis.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum debitis dolorum et hic illum
                            impedit libero minima minus molestiae, nam, non quia recusandae repellat sed sunt veritatis
                            voluptatem? Possimus, quis.</p>
                    </div>
                </div>
                <div class="col-3 col-sm-offset-1 mt-2">
                    <h5>Lokalizacja</h5>
                    <h6><i aria-hidden="true" class="fa fa-map-marker pt-1 mr-1"></i>
                        Aleja Wilanowska 25, Warszawa
                    </h6>
                    <h5 class="mt-4">Telefon kontaktowy</h5>
                    <h6></i>
                        <a href="tel:{{$club->phone}}">{{$club->phone}}</a>
                    </h6>
                    <h5 class="mt-4">Adres e-mail</h5>
                    <h6></i>
                        <a href="mailto:{{$club->email}}">{{$club->email}}</a>
                    </h6>
                    <h5 class="mt-4">Strona WWW</h5>
                    <h6></i>
                        <a target="_blank" href="{{$club->website_url}}">{{$club->website_url}}</a>
                    </h6>
                    @if($club->additional_address_info)
                        <h5 class="mt-4">Dotatkowe informacje</h5>
                        <h6></i>
                            {{$club->additional_address_info}}
                        </h6>
                    @endif
                </div>
                <div class="col-4">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2538.8838554085805!2d17.336993415694693!3d50.480505893079936!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4711c41a36be8787%3A0x6f4a9951377d38f0!2sNitro+Club!5e0!3m2!1spl!2spl!4v1534788954439"
                            width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>



        {{--@if(empty($rules) AND \Illuminate\Support\Facades\Auth::user()->id == $club->user_id)--}}
        {{--<p class="text-center mt-3 mb-3" style="color: white"> Nie masz jeszcze żadnych zasad ani możliwości w tym klubie.</p>--}}
        {{--@php var_dump($rules) @endphp--}}
        {{--@elseif(!empty($rules))--}}


        {{--<h3 class="text-center mb-2 mt-2">Zasady: </h3>--}}
        {{--<div class="row justify-content-center" style="margin-top: 30px; padding: 0px;">--}}
        {{--@foreach($rules as $rule)--}}
        {{--<div class="col-md-2 ml-5 mr-5" id="club-rules">--}}
        {{--<div class="rules-addnotations align-middle">--}}
        {{--<p>{{$rule->rule->name}}</p>--}}
        {{--</div>--}}
        {{--<img src="{{asset('img/icons/'.$rule->rule->image_path)}}">--}}

        {{--</div>--}}

        {{--@endforeach--}}

        {{--</div>--}}
        {{--@endif--}}


        <h3 class="text-center mt-5 mb-0">Kluby w pobliżu</h3>
        <hr>
    </div>
    <div class="row justify-content-center"
         style="padding:0px; max-width: 90%; margin: auto;  position: relative; margin-top: 80px; position: relative; height: 550px">
        <a class="btn-prev text-left align-left"> Poprzedni </a>
        @php $count = 0; @endphp
        @foreach($club->getClosestClubs($club) as $key => $my_club)

            <div class="club-slide" @if($count == 2) id="club-slide-left" @elseif($count == 1) id="club-slide-right"
                 @elseif($count == 0) id='club-slide-center' @endif style="margin: auto; margin-bottom: 50px;">
                <img id="box-shadow" src="{{url('img/box-shadow.png')}}">
                @if(empty(\App\Models\Club::getMain($my_club[0]['id'])))
                    <img src="{{url('img/brak-zdjecia.jpg')}}">
                @else
                    <img src="{{url('public/users/'. $my_club[0]['user_id'].'/'.\App\Models\Club::getMain($my_club[0]['id'])->image_path)}}">
                @endif

                <div class="club-slide-content">
                    <a href="{{url('/clubs/'. $my_club[0]['id'])}}" style="text-decoration: none">
                        <h2>{{$my_club[0]['official_name']}}</h2></a>

                    <div class="distance-box mt-5">
                        <p><span style="color: rgb(239, 58, 177);">@php
                                    if($my_club['distance'] < 1){
                                    $my_club['distance'] = $my_club['distance'] *1000;
                                    echo round($my_club['distance']).'m';
                                    } else {
                                    echo $my_club['distance'].'km';
                                    }
                                @endphp  </span>od {{$club->official_name}}</p>

                        <p style="font-family: Muli;font-size: 14px; margin: 0px; font-weight: 100"><i
                                    style="font-size: 12px;"
                                    class="fa fa-globe"></i> {{$my_club[0]['route'] . ' ' . $my_club[0]['street_number']}}
                        </p>

                        <p style="font-size: 14px; margin: 0px; font-weight: 100"><i style="font-size: 12px;"
                                                                                     class="fa fa-phone"></i> {{$my_club[0]['phone']}}
                        </p>
                    </div>
                    <div class="club-slide-footer">
                        <p class="pull-left"> Dla Ciebie: {{rand(0,100)}} %</p>

                        <a href="{{url('/clubs/'. $my_club[0]['id'])}}"
                           style="position: sticky; font-size: 14px; font-weight: 100; " class="navigator">Zobacz
                            więcej</a>

                        <div class="pull-right" style="display: inline-block; font-size: 16px">
                            <i style="color:white;" class="fa fa-star  mr-1"></i>
                            <i style="color:white;" class="fa fa-star  mr-1"></i>
                            <i style="color:white;" class="fa fa-star  mr-1"></i>
                            <i style="color:white;" class="fa fa-star mr-1"></i>
                            <i style="color:white;" class="fa fa-star  mr-1"></i>
                        </div>
                    </div>

                </div>
            </div>
            @php $count++; @endphp
            @if($count == 3)
                @break
            @endif
        @endforeach
        <a style="position: absolute; top: 33%" id="left" class="navigator" onclick="prev_slide()"><i
                    class="fa fa-angle-left"></i> </a>
        <a style="position: absolute; top: 33%" id="right" class="navigator" onclick="next_slide()"> <i
                    class="fa fa-angle-right"></i></a>


    </div>
    @if(isset($events) && ($events->count() !== 0)))
        <div class="container" id="events">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <h3>Wydarzenia w tym klubie: </h3>
                </div>
                <div id="event-carousel" class="carousel carousel-events slide carousel-fade" data-ride="carousel">
                    <div class="carousel-inner">
                        @php
                            $counter = 0;
                            $site = 1;
                        @endphp
                        @foreach($events as $event)

                            @php $counter++; @endphp
                            <div id="shadow-outside" class="carousel-item @if($counter == 1) active @endif "
                                 style="height: 420px; overflow: hidden">
                                <div class="event-image">

                                    <img class="event-image" src="{{asset('img/klub1.jpg')}}">
                                    <div id="shadow-inside"></div>

                                </div>

                                <div class="col-lg-12 event" style="padding-top:1rem; padding-bottom: 1rem">

                                    <div class="row">
                                        <div class="col-lg-1">
                                            <h1 style=" margin: 0px; @if($counter>9) font-size: 50px !important; margin-top: 35% !important; @endif"> {{$club->id}}
                                                . </h1>
                                        </div>
                                        <div class="col-lg-11">
                                            <p style="margin-top: 5px;" id="event-name">{{$event->title}}</p>
                                            <p id="event-date">{{substr($event->start_date,0,10)}} <span
                                                        class="pull-right">{{rand(200,9000)}}
                                                    osób</span></p>

                                        </div>
                                    </div>
                                    <hr style="background-color: white; text-align: center; margin-top: 5px">
                                    <div id="event-article" class="col-lg-19 text-center " style="; padding: 0px;">
                                        <article>
                                            {{$event->description}}
                                        </article>

                                    </div>
                                    <a style=" font-size: 20px;"
                                       class="mt-3 myBtn-link myBtn hvr-sweep-to-right animated fadeIn">Zobacz
                                        wiecej</a>
                                </div>


                            </div>
                        @endforeach


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

            {{--<clubs-nearest></clubs-nearest>--}}
        </div>
        @endif


        </div>

        </div>





        <!-- Modal -->
        <div class="modal fade" id="photos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">


                <img id="modal-photo" src="{{url('img/klub1.jpg')}}">


            </div>
            <button id="modal-button" id="modal-button" type="button" class="btn btn-secondary" data-dismiss="modal">X
            </button>

        </div>
@endsection
