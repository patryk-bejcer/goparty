@extends('layouts.app')

@section('content')

    <div class="container">
        @if(isset($flash))
            <flash message="{{$flash}}"></flash>
        @endif

        @include('layouts.includes.subpages-banner')


        <div class="row justify-content-center">
            @include('dashboard.includes.sidebar')
            <div class="col-md-9">
                <div class="card text-white bg-dark mb-3">
                    <div class="card-header text-center">
                        <b style="font-size: 20px;">Twoje kluby</b>
                        <hr style="margin-bottom: 0px; margin-top: 10px; height: 3px;">
                    </div>
                    <div  class="card-body" style="padding: 0.90rem; overflow: hidden">
                        @if (Session::has('message'))
                            <div class="alert alert-success">{{ Session::get('message') }}</div>
                        @endif
                        @foreach($clubs as $club)

                            <div id="club-row" class="row"   >
                                @if (!$club->primaryImage->isEmpty())
                                    <img class="img-fluid" src="{{url('/uploads/clubs/' . $club->primaryImage->last()->src)}}" alt="">
                                @else
                                    <img class="img-fluid" src="{{url('/img/klub1.jpg')}}" alt="">
                                @endif

                                <div class="col-md-9"  >


                                    <h3><a href="{{url('/clubs/' . $club->id)}}">{{$club->official_name}}</a></h3>
                                    <p class="mb-0">{{$club->route}} {{$club->street_number}}
                                        , {{$club->locality}}   </p>
                                    <p class="mb-2">Ostania modyfikacja: {{$club->updated_at}}  </p>
                                    <a style="font-size: 12px;" href=""><i class="fa fa-comments-o" aria-hidden="true"></i> (35)</a>
                                    <a style="font-size: 12px;" href=""><i class="fa fa-heart pl-2" aria-hidden="true"></i> (125)</`a>
                                    <a style="font-size: 12px;" href=""><i class="fa fa-star pl-2" aria-hidden="true"></i> 4.85</a>
                                </div>
                                {{--<div class="dropdown">--}}
                                    {{--<a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                        {{--Dropdown link--}}
                                    {{--</a>--}}

                                    {{--<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">--}}
                                        {{--<a class="dropdown-item" href="#">Action</a>--}}
                                        {{--<a class="dropdown-item" href="#">Another action</a>--}}
                                        {{--<a class="dropdown-item" href="#">Something else here</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                <div class="col-md-3 pull-right text-right">

                                    <a href="{{route('events.create', ['club_id' => $club->id])}}"
                                       class="btn btn-primary btn-sm mb-2 mr-2">Dodaj wydarzenie <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                    <a href="{{url('dashboard/clubs/' . $club->id . '/club-events')}}"
                                       class="btn btn-primary btn-sm mb-2 mr-2">Wydarzenia <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                    <a href="{{url('dashboard/clubs/' . $club->id . '/edit')}}"
                                       class="btn btn-secondary btn-sm mr-2 mb-2">Edycja <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                    <a href="{{route('club-gallery-manager', ['id' => $club])}}"
                                       class="btn btn-secondary btn-sm mr-2">Galeria zdjęć <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                </div>

                                    <a id="club-link" href="{{url('/clubs/' . $club->id)}}" class="btn btn-primary align-self-center hvr-sweep-to-right">Zobacz wiecej</a>



                            </div>


                        @endforeach
                            <div class="text-center justify-content-center">
                                {!! $clubs->links() !!}
                            </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
@endsection
