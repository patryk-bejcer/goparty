<div id="demo" class="carousel slide carousel-fade" data-ride="carousel"  >

    <!-- The slideshow -->

    <div class="carousel-inner" >
        <div class="carousel-item active animated fadeIn " >

            <img src="{{asset('img/slide1.png')}}" alt="Los Angeles"  >
            <div class="carousel-content-left ">
                <h3 class="animated slideInLeft">Just Now</h3>
                <h2 class="animated slideInRight">CLUB & BASS</h2>
                <a class="myBtn-link myBtn hvr-sweep-to-right animated fadeIn" href="#">Join us free</a>
                <div id="search-bar" class="input-group mt-4" style="height: 50px;">

                    <div class="input-group-prepend" >
                        <div style="width: 50px; background-color: rgb(239, 58, 177); border: 0px;" class="input-group-text"><a href="#"><span class="fa fa-search"></span></a></div>
                    </div>
                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Wyszukaj swój klub">

                </div>

            </div>

        </div>
        <div class="carousel-item animated fadeIn ">

            <img src="{{asset('img/slide1.png')}}" alt="Los Angeles"  >
            <div class="carousel-content-left ">
                <h3 class="animated slideInLeft">Just Now</h3>
                <h2 class="animated slideInRight">CLUB & BASS</h2>
                <a  class="myBtn-link myBtn hvr-sweep-to-right animated fadeIn" href="#">Join us free</a>

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