<div class="single-event mb-3 p-4">
    <div class="row">
        <div class="col-md-3">
            <img class="img-fluid"
                 src="http://static.asiawebdirect.com/m/bangkok/portals/bangkok-com/homepage/club-guide/pagePropertiesImage/clubs-bangkok.JPG"
                 alt="">
        </div>
        <div class="col-md-9">
            <span class="badge">{{ rand(1.00, 10.00) }}/10</span>
            <a href="{{ url('/events/' . $event->id)  }}"><h3>{{$event->title}}</h3></a>
            <h5><i class="fa fa-calendar-o" aria-hidden="true"></i>
                {{$event->start_date}}</h5>
            <h5><i class="fa fa-building"
                   aria-hidden="true"></i><a href="{{url('clubs/' . $event->club->id )}}">
                    {{$event->club->official_name }}</a> <i class="fa fa-map-marker pl-3"
                                                            aria-hidden="true"></i>
                {{$event->club->route }}, {{$event->club->locality }}</h5>
            <p class="mb-1">Wstęp od: {{$event->admission}}+ | Cena biletu: {{$event->ticket_price}}zł |
                Selekcja: @if($event->selection) Tak @else Nie @endif</p>
            <p>{{ str_limit($event->description, $limit = 250, $end = '...') }}</p>

        </div>
    </div>
</div>