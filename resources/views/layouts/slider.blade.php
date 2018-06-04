@section('css')
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
@endsection

<div id="demo" class="carousel slide carousel-fade" data-ride="carousel"  >

    <!-- The slideshow -->

    <div class="carousel-inner" >
        <div class="carousel-item active animated fadeIn " >

            <img src="{{asset('img/slide1.png')}}" alt="Los Angeles"  >
            <div class="carousel-content-left ">
                <h3 class="animated slideInLeft">Just Now</h3>
                <h2 class="animated slideInRight">CLUB & BASS</h2>
                @guest
                <a class="myBtn-link myBtn hvr-sweep-to-right animated fadeIn" href="{{route('register')}}">Dołącz za darmo</a>
                @endguest
                <form action="{{url('search/clubs')}}" method="GET">

                        <div id="search-bar" class="input-group mt-4" style="height: 50px;">

                        <div class="input-group-prepend" >
                            <div style="width: 50px; background-color: rgb(239, 58, 177); border: 0px;" class="input-group-text"><button type="submit"><span class="fa fa-search"></span></button></div>
                        </div>
                        <input id="search-club" type="text" name="search" class="form-control" placeholder="Wyszukaj swój klub">

                    </div>

                </form>


            </div>

        </div>
        <div class="carousel-item animated fadeIn ">

            <img src="{{asset('img/slide2.jpg')}}" alt="Los Angeles"  >
            <div class="carousel-content-right">
                <h3 class="animated slideInLeft">Znajdź swój</h3>
                <h2 class="animated slideInRight"> <span style="color: white;">ULUBIONY KONCERT</span></h2>
                <a   class="myBtn-link myBtn hvr-sweep-to-right animated fadeIn" href="#"><span style="font-size: 30px;">Zobacz wydarzenia</span></a>

            </div>

        </div>



    </div>

    <!-- Left and right controls -->
    <a  class="carousel-control-prev " href="#demo" data-slide="prev" style="font-size:4em; color:black; z-index: 1">
        <span  class="carousel-control fa fa-caret-left fa-sm" ></span>
    </a>
    <a class="carousel-control-next " href="#demo" data-slide="next" style="font-size:4em; color:black; z-index: 1">
        <span  class="carousel-control fa fa-caret-right fa-sm" ></span>
    </a>
</div>

<!-- End slideshow -->

@section('scripts')

@endsection