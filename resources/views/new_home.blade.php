@extends('layouts/app')

@section('content')

    <div class="container" id="clubs-container">

            <h3 class="text-center">Kluby w twojej okolicy</h3>

                    <div class="card-slider row justify-content-center">

                        <div   class="card-slide"   style="background-image: linear-gradient(to right, #46092e, black), url({{url('img/klub1.jpg')}})" id="slide1">
                            <div class="pull-right">
                                <form id="Like_form" action="#" method="post" >

                                    <fieldset class="rating">
                                        <input onclick="document.getElementById('Like_form').submit()" type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>

                                        <input checked onclick="document.getElementById('Like_form').submit()" type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>

                                        <input onclick="document.getElementById('Like_form').submit()" type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>

                                        <input onclick="document.getElementById('Like_form').submit()" type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>

                                        <input onclick="document.getElementById('Like_form').submit()" type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>

                                    </fieldset>

                                </form>
                            </div>
                            <script>
                                function showDiv(id) {
                                    $div = document.getElementById(id);
                                    if($div.style.display.valueOf() == ''){
                                        console.log('if');
                                        $div.style.display = 'none';
                                        return
                                    }


                                    $div.style.display= '';
                                }
                            </script>
                            <br>
                            <h3 style="margin-top: 50px"> Aquarium Nysa</h3>
                            <h3 id="value" style="font-size: 70px;">20<span style="font-size: 20px; font-weight: 200;">% Dla Ciebie</span> </h3>
                            <div class="col-lg-12" style="padding: 0px!important; margin-top: 10px;">
                                <a style=" font-size: 19px;" onclick="showDiv('music')"> Muzyka <span class="fa fa-angle-down"> </span></a> <br>
                                <div id="music" style="display: none;">
                                    <p style="color: white; font-size: 14px; font-family: Muli; font-weight: 200"> Lorem Ipsum Lorem Ipsum Lorem Ipsum </p>
                                </div>
                            </div>

                            <div class="col-lg-12" style="padding: 0px!important; margin-top: 10px;">
                            <a  style=" font-size: 19px;" onclick="showDiv('Entertainment')"> Rozrywka <span class="fa fa-angle-down"></a> <br>
                                <div id="Entertainment" style="display: none;">
                                    <p style="color: white; font-size: 14px; font-family: Muli; font-weight: 200"> Lorem Ipsum Lorem Ipsum Lorem Ipsum </p>
                                </div>
                            </div>
                            <div class="col-lg-12" style="padding: 0px!important;margin-top: 10px;">
                            <a style=" font-size: 19px;" onclick="showDiv('food')"> Jedznie i napoje <span class="fa fa-angle-down"></a> <br>
                                <div id="food" style="display: none;">
                                    <p style="color: white; font-size: 14px; font-family: Muli; font-weight: 200"> Lorem Ipsum Lorem Ipsum Lorem Ipsum </p>
                                </div>
                            </div>



                        </div>
                        <div class="card-slide"   style="background-image: url({{url('img/klub1.jpg')}})" id="slide2">
                            <div class="pull-right">
                                <form id="Like_form" action="#" method="post" >

                                    <fieldset class="rating">
                                        <input  onclick="document.getElementById('Like_form').submit()" type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>

                                        <input onclick="document.getElementById('Like_form').submit()" type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>

                                        <input checked onclick="document.getElementById('Like_form').submit()" type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>

                                        <input onclick="document.getElementById('Like_form').submit()" type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>

                                        <input onclick="document.getElementById('Like_form').submit()" type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>

                                    </fieldset>

                                </form>
                            </div>


                        </div>
                        <div class="card-slide"   style="background-image: url({{url('img/klub1.jpg')}})" id="slide3">
                            <div class="pull-right">
                                <form id="Like_form" action="#" method="post" >

                                    <fieldset class="rating">
                                        <input onclick="document.getElementById('Like_form').submit()" type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>

                                        <input onclick="document.getElementById('Like_form').submit()" type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>

                                        <input onclick="document.getElementById('Like_form').submit()" type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>

                                        <input checked onclick="document.getElementById('Like_form').submit()" type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>

                                        <input onclick="document.getElementById('Like_form').submit()" type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>

                                    </fieldset>

                                </form>
                            </div>


                        </div>

                    </div>
                        <a id="prev" href="#demo" data-slide="prev" style="font-size:4em; ">
                            <span class="carousel-control fa fa-angle-left" ></span>
                        </a>
                        <a id="next" href="#demo" data-slide="next" style="font-size:4em;">
                            <span class="carousel-control fa fa-angle-right" ></span>
                        </a>
                </div>
            </div>



        <div style="margin-top: 500px;" class="row justify-content-center">
          <div class="col-lg-5" id="search">
              <div id="search-bar" class="input-group" style="height: 50px;">

                      <div class="input-group-prepend" >
                          <div style="width: 50px; background-color: rgb(239, 58, 177); border: 0px;" class="input-group-text"><a href="#"><span class="fa fa-search"></span></a></div>
                      </div>
                      <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Wyszukaj swój klub">

              </div>
          </div>
        </div>

    <div class="container" id="clubs-container">
        <div class="row justify-content-center">
            <div  class="col-lg-auto" style="margin-top: 100px; margin-bottom: 100px;">
                <h3 class="text-right" style="font-weight: 200; right: 25%; font-size: 40px;">WYDARZENIA</h3>
                <h3 stclass=" text-center">NADCHODZĄCE DATY</h3>
            </div>
        </div>
        <div class="row justify-content-center" id="events" >

            <div class="col-lg-4" style=" padding-left: 30px;padding-right: 30px; max-width: 28%; " id="event2"   >
                <img src="{{url('img/square_events.png')}}">
                <div class="row" onmouseover="this.childNodes[1].childNodes[1].style.color = 'rgb(239, 58, 177)';" onmouseleave="this.childNodes[1].childNodes[1].style.color = 'white';">
                    <div class="col-lg-2" >
                        <h1 style="padding: 0px; margin: 0px;"> 1. </h1>
                       <!-- <p style="margin-top: 30px; font-weight: 200;" id="event-date">8220 <br> ludzi</p>-->
                    </div>
                    <div class="col-lg-10">
                        <p style="margin-bottom: 0px;">Koncert <br> Guns n Roses </p>
                        <p id="event-date" style="margin-top: 0px; padding: 0px; ">18.05.2017 <span class="pull-right">8220 ludzi</span> </p>

                    </div>
                </div>
                <div  class="col-lg-12" style="; padding: 0px;">
                    <article >
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum convallis sem at neque iaculis volutpat.
                        Vivamus in convallis neque, nec posuere turpis. Duis condimentum ante at turpis porta dapibus.
                    </article>
                    <a class="myBtn-link myBtn hvr-sweep-to-right animated fadeIn">Zobacz wiecej</a>
                </div>



            </div>
            <div class="col-lg-4" style=" padding-left: 30px;padding-right: 30px; max-width: 28%; " id="event2"   >
                <img src="{{url('img/square_events.png')}}">
                <div class="row" onmouseover="this.childNodes[1].childNodes[1].style.color = 'rgb(239, 58, 177)';" onmouseleave="this.childNodes[1].childNodes[1].style.color = 'white';">
                    <div class="col-lg-2" >
                        <h1 style="padding: 0px; margin: 0px;"> 1. </h1>
                        <!-- <p style="margin-top: 30px; font-weight: 200;" id="event-date">8220 <br> ludzi</p>-->
                    </div>
                    <div class="col-lg-10">
                        <p style="margin-bottom: 0px;">Koncert <br> Guns n Roses </p>
                        <p id="event-date" style="margin-top: 0px; padding: 0px; ">18.05.2017 <span class="pull-right">8220 ludzi</span> </p>

                    </div>
                </div>
                <div  class="col-lg-12" style="; padding: 0px;">
                    <article >
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum convallis sem at neque iaculis volutpat.
                        Vivamus in convallis neque, nec posuere turpis. Duis condimentum ante at turpis porta dapibus.
                    </article>
                    <a class="myBtn-link myBtn hvr-sweep-to-right animated fadeIn">Zobacz wiecej</a>
                </div>



            </div>
            <div class="col-lg-4" style=" padding-left: 30px;padding-right: 30px; max-width: 28%; " id="event2"   >
                <img src="{{url('img/square_events.png')}}">
                <div class="row" onmouseover="this.childNodes[1].childNodes[1].style.color = 'rgb(239, 58, 177)';" onmouseleave="this.childNodes[1].childNodes[1].style.color = 'white';">
                    <div class="col-lg-2" >
                        <h1 style="padding: 0px; margin: 0px;"> 1. </h1>
                        <!-- <p style="margin-top: 30px; font-weight: 200;" id="event-date">8220 <br> ludzi</p>-->
                    </div>
                    <div class="col-lg-10">
                        <p style="margin-bottom: 0px;">Koncert <br> Guns n Roses </p>
                        <p id="event-date" style="margin-top: 0px; padding: 0px; ">18.05.2017 <span class="pull-right">8220 ludzi</span> </p>

                    </div>
                </div>
                <div  class="col-lg-12" style="; padding: 0px;">
                    <article >
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum convallis sem at neque iaculis volutpat.
                        Vivamus in convallis neque, nec posuere turpis. Duis condimentum ante at turpis porta dapibus.
                    </article>
                    <a class="myBtn-link myBtn hvr-sweep-to-right animated fadeIn">Zobacz wiecej</a>
                </div>



            </div>



            </div>

        </div>
    </div>




    @endsection