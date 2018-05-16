@extends('layouts.app')

@section('content')

    <div class="container" style="max-width: 85%; padding: 0px; margin-top: 120px;" id="single_club" >

        <div class="row justify-content-center">

            <div class="club-border"> </div>
            <div class="col-lg-5">
                @if(empty($club->getMain($club->id)))
                    <p>Ten klub nie ma jeszcze dodanych zdjęć</p>
                    @else
                <img onclick="loadGallery(this)" data-toogle = 'modal' data-target="#photos" id="img-gallery" src="{{url('public/users/'.$club->user_id.'/'.$club->getMain($club->id)->image_path)}}">
                @endif
                @if (empty($club->getPhotos($club, 3)))

                @else

                <div class="row" id="other-image">
                    @foreach($club->getPhotos($club, 3) as $photo)
                    <div class="col-lg-4" >
                        <img onclick="loadGallery(this)" id="img-gallery" src="{{url('public/users/'.$photo->user_id.'/'.$photo->image_path)}}">
                    </div>

                        @endforeach

                </div>
                    @endif
            </div>

            <div class="col-lg-7" style="padding-top: 0px;">
                <h2 style="margin-top: 0px;" class="text-center">{{$club->official_name}}</h2>
                <hr>
                <p id="description">
                    Lorem Ipsum jest tekstem stosowanym jako przykładowy wypełniacz w przemyśle poligraficznym. Został po raz pierwszy użyty w XV w. przez nieznanego drukarza do wypełnienia tekstem próbnej książki. Pięć wieków później zaczął być używany przemyśle elektronicznym, pozostając praktycznie niezmienionym. Spopularyzował się w latach 60. XX w. wraz z publikacją arkuszy Letrasetu, zawierających fragmenty Lorem Ipsum, a ostatnio z zawierającym różne wersje Lorem Ipsum oprogramowaniem przeznaczonym do realizacji druków na komputerach osobistych, jak Aldus PageMaker
                </p>
                <div class="description-footer" >
                    <a href="#" ><i class="fa fa-globe" style="margin-right: 5px"> </i> <span style="color: white; ">wojewodztwo: </span>{{$club->voivodeship}} </a>
                    <a href="#" ><i class="fa fa-globe" style="margin-right: 5px"> </i> <span style="color: white; ">Ulica: </span>{{$club->route}}{{$club->street_number}} </a>
                </div>

            </div>
        </div>
        @if(empty($rules) AND \Illuminate\Support\Facades\Auth::user()->id == $club->user_id)
            <p class="text-center mt-3 mb-3" style="color: white"> Nie masz jeszcze żadnych zasad ani możliwości w tym klubie.</p>
            @php var_dump($rules) @endphp
            @elseif(!empty($rules))

        @
        <h3 class="text-center mb-2 mt-2">Zasady: </h3>
        <div class="row justify-content-center" style="margin-top: 30px; padding: 0px;">
            @foreach($rules as $rule)
            <div class="col-md-2 ml-5 mr-5" id="club-rules">
                <div class="rules-addnotations align-middle">
                    <p>{{$rule->rule->name}}</p>
                </div>
                <img src="{{asset('img/icons/'.$rule->rule->image_path)}}">

            </div>

        @endforeach

        </div>
        @endif
        @php
            $club2 = \App\Models\Club::findOrFail(4);
        @endphp
        <h3 class="text-center mt-5 mb-5">Kluby w pobliżu</h3>
    </div>
        <div class="row justify-content-center" style="padding:0px; max-width: 90%; margin: auto;  position: relative; margin-top: 80px; position: relative; height: 550px">
            <a class="btn-prev text-left align-left"> Poprzedni </a>
            @php $count = 0; @endphp
            @foreach($club->getClosestClubs($club) as $key => $my_club)
                @php $closest_club = \App\Models\Club::findorFail($my_club[0]['id']) @endphp
            <div class="club-slide"  @if($count == 2) id="club-slide-left" @elseif($count == 1) id="club-slide-right" @elseif($count == 0) id = 'club-slide-center' @endif style="margin: auto; margin-bottom: 50px;">
                <img id="box-shadow" src="{{url('img/box-shadow.png')}}">
                @if(empty(\App\Models\Club::getMain($my_club[0]['id'])))
                    <img src="{{url('img/brak-zdjecia.jpg')}}">
                    @else
                    <img src="{{url('public/users/'. $my_club[0]['user_id'].'/'.\App\Models\Club::getMain($my_club[0]['id'])->image_path)}}">
                    @endif

                <div class="club-slide-content">
                    <a href="{{url('/clubs/'. $my_club[0]['id'])}}" style="text-decoration: none"><h2>{{$my_club[0]['official_name']}}</h2></a>

                    <div class="distance-box mt-5">
                        <p><span style="color: rgb(239, 58, 177);">@php
                                    if($my_club['distance'] < 1){
                                    $my_club['distance'] = $my_club['distance'] *1000;
                                    echo round($my_club['distance']).'m';
                                    } else {
                                    echo $my_club['distance'].'km';
                                    }
                                @endphp  </span>od {{$club->official_name}}</p>

                        <p style="font-family: Muli;font-size: 14px; margin: 0px; font-weight: 100"> <i style="font-size: 12px;" class="fa fa-globe"></i> {{$my_club[0]['route'] . ' ' . $my_club[0]['street_number']}}</p>

                        <p style="font-size: 14px; margin: 0px; font-weight: 100"><i style="font-size: 12px;"class="fa fa-phone"></i> {{$my_club[0]['phone']}}</p>
                    </div>
                    <div class="club-slide-footer" >
                        <p class="pull-left"> Dla Ciebie: {{rand(0,100)}} %</p>

                            <a href="{{url('/clubs/'. $my_club[0]['id'])}}" style="position: sticky; font-size: 14px; font-weight: 100; " class="navigator">Zobacz więcej</a>

                        <div class="pull-right" style="display: inline-block; font-size: 16px">
                            <i  style="color:white;" class="fa fa-star  mr-1"></i>
                            <i  style="color:white;" class="fa fa-star  mr-1"></i>
                            <i  style="color:white;" class="fa fa-star  mr-1"></i>
                            <i  style="color:white;" class="fa fa-star mr-1"></i>
                            <i  style="color:white;" class="fa fa-star  mr-1"></i>
                        </div>
                    </div>

                </div>
            </div>
                @php $count++; @endphp
                @if($count == 3)
                    @break
                @endif
                @endforeach
            <a  id="left" class="navigator" onclick="prev_slide()" ><i class="fa fa-angle-left"></i> </a>
            <a  id="right" class="navigator" onclick="next_slide()" >  <i class="fa fa-angle-right"></i></a>
        </div>



    <!-- Modal -->
    <div class="modal fade" id="photos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">


                <img id = "modal-photo" src="{{url('img/klub1.jpg')}}">

               

            </div>
        <button id="modal-button" id="modal-button" type="button" class="btn btn-secondary" data-dismiss="modal">X</button>
     
    </div>
@endsection
