@extends('layouts.app')

@section('content')

    <div class="container" style="max-width: 85%; padding: 0px; margin-top: 120px;" id="single_club" >

        <div class="row justify-content-center">

            <div class="club-border"> </div>
            <div class="col-lg-5">
                @if(empty($club->getMain($club)))
                    <p>Ten klub nie ma jeszcze dodanych zdjęć</p>
                    @else
                <img onclick="loadGallery(this)" data-toogle = 'modal' data-target="#photos" id="img-gallery" src="{{url('public/users/'.$club->user_id.'/'.$club->getMain($club)->image_path)}}">
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
        <h3 class="text-center mt-4">Kluby w pobliżu</h3>
        <p> Odleglosc pomiedzy klubem {{$club->official_name}} a klubem {{$club2->official_name}} to : {{round($club->getDistanceBetween($club, $club2), 2)}}</p>
       @php
        var_dump($club->getClosestClubs($club));
       @endphp
    </div>

    <!-- Modal -->
    <div class="modal fade" id="photos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">


                <img id = "modal-photo" src="{{url('img/klub1.jpg')}}">

               

            </div>
        <button id="modal-button" id="modal-button" type="button" class="btn btn-secondary" data-dismiss="modal">X</button>
     
    </div>
@endsection
