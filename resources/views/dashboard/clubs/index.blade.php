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
                                <img src="{{url('/img/klub1.jpg')}}">

                                <div class="col-md-10"  >


                                    <h3><a href="{{url('/clubs/' . $club->id)}}">{{$club->official_name}}</a></h3>
                                    <p class="mb-0">{{$club->route}} {{$club->street_number}}
                                        , {{$club->locality}}   </p>
                                    <p class="mb-2">Ostania modyfikacja: {{$club->updated_at}}  </p>
                                    <a style="font-size: 12px;" href=""><i class="fa fa-comments-o" aria-hidden="true"></i> (35)</a>
                                    <a style="font-size: 12px;" href=""><i class="fa fa-heart pl-2" aria-hidden="true"></i> (125)</`a>
                                    <a style="font-size: 12px;" href=""><i class="fa fa-star pl-2" aria-hidden="true"></i> 4.85</a>
                                </div>
                                <div class="col-md-2">
                                    <a href="{{route('events.create', ['club_id' => $club->id])}}"
                                       class="btn btn-primary btn-sm mb-2 mr-2">Dodaj wydarzenie</a>
                                    <a href="{{url('dashboard/clubs/' . $club->id . '/club-events')}}"
                                       class="btn btn-primary btn-sm mb-2 mr-2">Wydarzenia</a>
                                    <a href="{{url('dashboard/clubs/' . $club->id . '/edit')}}"
                                       class="btn btn-secondary btn-sm mr-2 mb-2">Edycja</a>
                                    <a href="{{route('club-gallery-manager', ['id' => $club])}}"
                                       class="btn btn-secondary btn-sm mr-2">Galeria zdjęć</a>
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
