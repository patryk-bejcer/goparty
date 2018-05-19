@extends('layouts.app')

@section('content')

    <div class="container" id="clubs-container" style="max-width: 90%;" data-scroll = 'scroll'>

        <h3 class="text-center">Wyszukane kluby:</h3>

        <div class="row justify-content-center ">


        @foreach($clubs as $club)
            <div class="club-slide col-md-3" style="position: relative; margin: 20px; height: 320px; padding: 0px">
                @if(empty(\App\Models\Club::getMain($club['id'])))
                    <img style="position: absolute; left: 0px" src="{{url('img/brak-zdjecia.jpg')}}">
                @else
                    <img style="position: absolute; left: 0px" src="{{url('public/users/'. $club['user_id'].'/'.\App\Models\Club::getMain($club['id'])->image_path)}}">
                @endif
                <div class="club-slide-content" style="position: relative;  ">

                    <a  href="{{url('clubs/'.$club->id)}}"> <h2 style="transform: none">{{$club->official_name}}</h2></a>

                    @if($club->getUser()->id == \Illuminate\Support\Facades\Auth::user()->id)
                        <div class="col-md-12 text-center">


                        <a href="{{url('dashboard/clubs/'. $club->id .'/edit')}}" class="btn btn-primary text-center"><i class="fa fa-edit"></i> Edytuj klub</a>
                        </div>
                        @endif
                    <div class="club-slide-footer" style="transition-delay: 0ms;">
                        <div class="row justify-content-center">

                            <div class="col-md-5">
                            <p class="pull-left"> Dla Ciebie: {{rand(0,100)}} %</p>
                            </div>
                            <div class="col-md-7">
                            <a href="{{url('/clubs/'. $club['id'])}}" style="position: sticky; font-size: 14px; font-weight: 100; " class="navigator">Zobacz więcej</a>
                            </div>

                            <div class="col-md-12 mt-2">
                                <div class="" style="display: inline-block; font-size: 16px">
                                    <i  style="color:white;" class="fa fa-star  mr-1"></i>
                                    <i  style="color:white;" class="fa fa-star  mr-1"></i>
                                    <i  style="color:white;" class="fa fa-star  mr-1"></i>
                                    <i  style="color:white;" class="fa fa-star mr-1"></i>
                                    <i  style="color:white;" class="fa fa-star  mr-1"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>


            @endforeach
        </div>

    </div>


    @endsection