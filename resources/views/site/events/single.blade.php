@extends('layouts.app')

@section('content')

    <div class="container">

        @include('layouts.includes.subpages-banner')

        <div id="single-event" class="pt-2 pb-5">

            <div class="row mb-3">

                <div class="col-12">
                    <div class="breadcrumbIn" itemprop="breadcrumb"><b><a href="{{url('/')}}"><i
                                        class="fa fa-home tip" title="Home"></i></a></b> <i
                                class="fa fa-angle-right"></i> <b><a href="{{ url('events') }}"><span>Imprezy</span></a></b> <i
                                class="fa fa-angle-right"></i> <b class="inactive_l"><a href="#" onclick="return false;"
                            ><span>{{$event->title}}</span></a></b></div>
                </div>

            </div>

            <div class="row mt-3">

                <div class="col-12">
                    <article>
                        <div class="card text-white mb-3 pt-3 pb-3 pl-3 pr-3">

                            <div class="d-flex justify-content-between ">
                                <div>
                                    <h1>{{$event->title}}</h1>
                                </div>
                                <div class="d-flex justify-content-end ">
                                    @if(Auth::check())
                                        @if(!$event->checkIfAttendance())

                                            <form method="POST" action="{{url('/take-part')}}">
                                                @csrf
                                                <input name="event_id" type="hidden" value="{{$event->id}}">
                                                <input style="background: #EF3AB1 !important" class="btn btn-success pull-right" type="submit" value="Weź udział">
                                            </form>

                                        @else

                                            <form method="POST" action="{{url('/take-part')}}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <input name="event_id" type="hidden" value="{{$event->id}}">
                                                <input style="background: #EF3AB1 !important" class="btn btn-success pull-right" type="submit" value="Zrezygnuj z imprezy">
                                            </form>

                                        @endif

                                    @endif

                                </div>
                            </div>

                            <div class="row p-2">
                                <div class="col-12 col-md-4 pr-2">
                                    <div style="background-image:url('{{ url('/uploads/events/' . $event->event_img) }}')" class="h-100 event-img" ></div>
                                </div>
                                <div class="col-12 col-md-4 pl-2 pr-3" >
                                    <h4>Informacje</h4>
                                    <h5>Lokalizacja</h5> <h6><i aria-hidden="true"
                                                                class="fa fa-map-marker pt-1 mr-1"></i>
                                        Buckridge Divide 464, East Lempi
                                    </h6> <h5 class="mt-4">Telefon kontaktowy</h5> <h6><a href="tel:888.513.6154">888.513.6154</a>
                                    </h6> <h5 class="mt-4">Adres e-mail</h5> <h6><a
                                                href="mailto:oliver.carroll@connelly.com">oliver.carroll@connelly.com</a>
                                    </h6> <h5 class="mt-4">Strona WWW</h5> <h6><a target="_blank" href="roberts.net">roberts.net</a>
                                    </h6> <h5 class="mt-4">Dotatkowe informacje</h5> <h6>
                                        It sounded.
                                    </h6>


                                </div>
                                <div class="col-12 col-md-4 pl-3">
                                    <h4>Mapa dojazdu</h4>
                                    <iframe class="p-0 pr-0"
                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d312776.9797743159!2d20.781008020168624!3d52.23302685911996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471ecc669a869f01%3A0x72f0be2a88ead3fc!2sWarszawa!5e0!3m2!1spl!2spl!4v1536223712309"
                                            width="100%" height="90%" frameborder="0" style="border:0"
                                            allowfullscreen></iframe>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 pl-4">
                                    <h4 class="mt-4">Opis imprezy</h4>
                                    <p>It was great to hear all the Queen hits and even greater because of Adam Lamberts
                                        fantastic voice. Employing limited videos of Freddy Mercury into the concert was
                                        done in good taste and added lot of meaning. Adam did not try to mimic Freddy
                                        Mercury but used his natural talents carry the group through the concert. It was
                                        a great combination and hopefully will continue. It was one of those concerts
                                        where you weren’t sure what to expect and the results were fantastic.</p>
                                    <p>It was great to hear all the Queen hits and even greater because of Adam Lamberts
                                        fantastic voice. Employing limited videos of Freddy Mercury into the concert was
                                        done in good taste and added lot of meaning. Adam did not try to mimic Freddy
                                        Mercury but used his natural talents carry the group through the concert. It was
                                        a great combination and hopefully will continue. It was one of those concerts
                                        where you weren’t sure what to expect and the results were fantastic.</p>
                                    <p>It was great to hear all the Queen hits and even greater because of Adam Lamberts
                                        fantastic voice. Employing limited videos of Freddy Mercury into the concert was
                                        done in good taste and added lot of meaning. Adam did not try to mimic Freddy
                                        Mercury but used his natural talents carry the group through the concert. It was
                                        a great combination and hopefully will continue. It was one of those concerts
                                        where you weren’t sure what to expect and the results were fantastic.</p>
                                    <p>It was great to hear all the Queen hits and even greater because of Adam Lamberts
                                        fantastic voice. Employing limited videos of Freddy Mercury into the concert was
                                        done in good taste and added lot of meaning. Adam did not try to mimic Freddy
                                        Mercury but used his natural talents carry the group through the concert. It was
                                        a great combination and hopefully will continue. It was one of those concerts
                                        where you weren’t sure what to expect and the results were fantastic.</p>
                                </div>
                            </div>

                            <div>
                                <iframe class="p-2 pr-0"
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d312776.9797743159!2d20.781008020168624!3d52.23302685911996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471ecc669a869f01%3A0x72f0be2a88ead3fc!2sWarszawa!5e0!3m2!1spl!2spl!4v1536223712309"
                                        width="100%" height="300" frameborder="0" style="border:0"
                                        allowfullscreen></iframe>
                            </div>


                            <div class="row d-none">
                                <div class="col-12 pl-4">
                                    <p class="tagcloud mt clr"><a href="{{url('/')}}tag/arena/"
                                                                  rel="tag"><i class="fa fa-tag mi"></i>Arena</a><a
                                                href="{{url('/')}}" rel="tag"><i
                                                    class="fa fa-tag mi"></i>Garden</a><a
                                                href="{{'/'}}" rel="tag"><i
                                                    class="fa fa-tag mi"></i>Grand</a></p>
                                </div>
                            </div>


                        </div>
                    </article>
                </div>

            </div>

            {{--<div class="row mt-3 d-none" >--}}

                {{--<div class="col-12">--}}
                        {{--<div class="card text-white mb-3 pt-3 pb-3 pl-3 pr-3">--}}
                            {{--<div class="d-flex justify-content-between align-items-center">--}}
                                {{--<div>--}}
                                    {{--<h1>Podobne imprezy</h1>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="row pl-4 pr-2 pb-4">--}}

                            {{--</div>--}}
                        {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

@endsection

