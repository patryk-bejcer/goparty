@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-3" id="sidebar">

                <div class="card text-white bg-dark mb-3 user-left-menu">
                    <div class="card-header">

                    </div>

                    <div class="list-group panel">

                        @role('owner')
                        <a href="#menu1" class="list-group-item collapsed" data-toggle="collapse" data-parent="#sidebar"
                           aria-expanded="false"><i class="fa fa-music"></i> <span class="hidden-sm-down"> Kluby</span> </a>
                        <div class="collapse" id="menu1">
                            <a href="{{url('/dashboard/clubs')}}" class="list-group-item" data-parent="#menu1">Moje kluby</a>
                            <a href="{{url('/dashboard/clubs/create')}}" class="list-group-item" data-parent="#menu1">Dodaj nowy klub</a>
                        </div>
                        @endrole

                        <a href="#menu2" class="list-group-item collapsed" data-toggle="collapse" data-parent="#sidebar"
                           aria-expanded="false"><i class="fa fa-music"></i> <span class="hidden-sm-down"> Wydarzenia</span> </a>
                        @role('owner')
                        <div class="collapse" id="menu2">
                            <a href="{{url('dashboard/owner-all-events')}}" class="list-group-item" data-parent="#menu1">Moje wydarzenia</a>
                        </div>
                        @endrole

                        <a href="#" class="list-group-item collapsed" data-parent="#sidebar"><i class="fa fa-gear"></i> <span
                                    class="hidden-sm-down">Ustawienia konta</span></a>

                    </div>


                </div>


            </div>


            <div class="col-md-9">
                <div class="card text-white bg-dark mb-3 pt-3 pb-3 pl-3 pr-3 user-left-menu">
                    <h1>Imprezy</h1>
                    @foreach($events as $event)
                        <div class="row">
                            <div class="col-md-3">
                                <img class="img-fluid"
                                     src="http://static.asiawebdirect.com/m/bangkok/portals/bangkok-com/homepage/club-guide/pagePropertiesImage/clubs-bangkok.JPG"
                                     alt="">
                            </div>
                            <div class="col-md-9">
                                <h3>{{$event->title}}</h3>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
@endsection
