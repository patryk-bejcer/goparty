@extends('layouts.app')

@section('title', $club->official_name)

@section('content')

    @if(isset($flash))
        <flash message="{{$flash}}"></flash>
    @endif

    <clubs-header></clubs-header>

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

            <div class="col-lg-5">
                    @if (!$club->primaryImage->isEmpty())
                    <img class="img-fluid" src="{{url('/uploads/clubs/' . $club->primaryImage->last()->src)}}" alt="">
                     @else
                    <img class="img-fluid" src="{{url('/img/default-event-img.jpg')}}" alt="">
                     @endif

            </div>

            <div class="col-lg-7" style="padding-top: 0px;">
                <h2 style="margin-top: 0px;" class="text-center mt-3 mt-md-0">{{$club->official_name}}</h2>
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
            <div class="d-flex justify-content-between flex-column flex-md-row  text-white mb-5">
                <div class="col-12 col-md-4 mb-3 mb-md-0 order-2 order-md-0">
                    <div class="rate">
                        <club-rate :club="{{$club->id}}"></club-rate>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum debitis dolorum et hic illum
                            impedit libero minima minus molestiae, nam, non quia recusandae repellat sed sunt veritatis
                            voluptatem? Possimus, quis.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum debitis dolorum et hic illum
                            impedit libero minima minus molestiae, nam, non quia recusandae repellat sed sunt veritatis
                            voluptatem? Possimus, quis.</p>
                    </div>
                </div>
                <div class="col-12 col-md-3 col-sm-offset-1 mt-2 mb-4 mb-md-0 order-0 order-md-1">
                    <h5>Lokalizacja</h5>
                    <h6><i aria-hidden="true" class="fa fa-map-marker pt-1 mr-1"></i>
                        {{$club->route}} {{$club->street_number}}, {{$club->locality}}
                    </h6>
                    <h5 class="mt-4">Telefon kontaktowy</h5>
                    <h6></i>
                        <a href="tel:{{$club->phone}}">{{$club->phone}}</a>
                    </h6>
                    <h5 class="mt-4">Adres e-mail</h5>
                    <h6></i>
                        <a href="mailto:{{$club->email}}">{{$club->email}}</a>
                    </h6>
                    @if($club->website_url)
                        <h5 class="mt-4">Strona WWW</h5>
                        <h6></i>
                            <a target="_blank" href="{{$club->website_url}}">{{$club->website_url}}</a>
                        </h6>
                    @endif
                    @if($club->additional_address_info)
                        <h5 class="mt-4">Dotatkowe informacje</h5>
                        <h6></i>
                            {{$club->additional_address_info}}
                        </h6>
                    @endif
                </div>
                <div class="col-12 mb-4 mb-md-2 col-md-4 order-1 order-md-2">
                    <google-map
                            name="{{$club->id}}"
                            lat="{{$club->latitude}}"
                            long="{{$club->longitude}}"
                    ></google-map>
                </div>
            </div>
        </div>
    </div>
@endsection
