@section('css')
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
@endsection

<section id="slider-main">

    <div id="slide" class="carousel slide carousel-fade" data-ride="carousel">

        <div class="carousel-inner">

            <div class="carousel-item active animated fadeIn ">

                <img src="{{asset('img/slide1.png')}}" alt="GoParty - Wyszukiwarka klubów oraz imprez">

                <div class="carousel-content-left ">
                    <h3 class="animated slideInLeft">Najlepsze kluby i imprezy</h3>
                    <h2 class="animated slideInRight">GoParty.pl</h2>
                    @guest
                        <a class="myBtn-link myBtn hvr-sweep-to-right animated fadeIn" href="{{route('register')}}">Dołącz
                            za darmo</a>
                    @endguest
                    <form action="{{url('search/clubs')}}" method="GET">

                        <div id="search-bar" class="input-group mt-4" style="height: 50px;">

                            <div class="input-group-prepend">
                                <div style="width: 50px; background-color: rgb(239, 58, 177); border: 0px;"
                                     class="input-group-text">
                                    <button type="submit"><span class="fa fa-search"></span></button>
                                </div>
                            </div>
                            <input id="search-club" type="text" name="search" class="form-control"
                                   placeholder="Wyszukaj swój klub">

                        </div>

                    </form>


                </div>

            </div>
            <div class="carousel-item animated fadeIn ">

                <img src="{{asset('img/slide2.jpg')}}" alt="Los Angeles">
                <div class="carousel-content-right">
                    <h3 class="animated slideInLeft text-white">Znajdź swój</h3>
                    <h2 class="animated slideInRight"><span style="color: white;">ULUBIONY KONCERT</span></h2>
                    <a class="myBtn-link myBtn hvr-sweep-to-right animated fadeIn" href="events"><span
                                >Zobacz wydarzenia</span></a>

                </div>

            </div>


        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev " href="#slide" data-slide="prev" style=" color:black; z-index: 1">
            <span class="carousel-control fa fa-caret-left"></span>
        </a>
        <a class="carousel-control-next " href="#slide" data-slide="next" style=" color:black; z-index: 1">
            <span class="carousel-control fa fa-caret-right"></span>
        </a>
    </div>
</section>

<!-- End slideshow -->

@section('scripts')

@endsection