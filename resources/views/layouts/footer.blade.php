<footer>
    <div class="container pb-3" style=" background-image: url({{url('img/footer-bg.jpg')}})" id="footer">
        <div class="row justify-content-center" style=' margin: 0 auto; margin-bottom: 30px;'>


            <div class="col-6 col-sm-4 col-lg-2 mb-5 mb-sm-0">
                <div class="link" style="margin-bottom: 30px;">
                    <a> Przydatne linki </a>
                </div>

                <div class="link">
                    <a href="{{url('/events')}}" id="footer-link">Wydarzenia</a>
                </div>
                <div class="link">
                    <a href="{{url('/clubs/#/clubs')}}" id="footer-link">Kluby</a>
                </div>
                <div class="link">
                    <a id="footer-link">Muzyka</a>
                </div>

            </div>
            <div class="col-6 col-sm-4 col-lg-2 mb-5 mb-sm-0">
                <div class="link" style="margin-bottom: 30px;">
                    <a> Pomoc </a>
                </div>

                <div class="link">
                    <a id="footer-link">O nas</a>
                </div>
                <div class="link">
                    <a href="{{url('/contact')}}" id="footer-link">Kontakt</a>
                </div>
                <div class="link">
                    <a href="{{route('private-policy')}}" id="footer-link">Polityka prywatności</a>
                </div>

            </div>
            @if(!Auth::check())
            <div class="col-12 col-sm-4 col-lg-2 ">
                <div class="link" style="margin-bottom: 30px;">
                    <a> Dołącz do nas </a>
                </div>

                <div class="link">
                    <a  href="{{ route('login') }}" id="footer-link">Zaloguj sie</a>
                </div>
                <div class="link">
                    <a href="{{ route('register') }}" id="footer-link">Zarejestruj sie</a>
                </div>

            </div>
            @endif

            <div class="col-12 col-lg-2 pr-2 pl-0">

                <div class="d-flex justify-content-center social-media-list mt-5">

                    <div>
                        <a href="">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div>
                        <a href="">
                            <i class="fa fa-google-plus" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div>
                        <a href="">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div>
                        <a href="">
                            <i class="fa fa-youtube-play" aria-hidden="true"></i>
                        </a>
                    </div>

                </div>

            </div>

        </div>
        {{--<div class="col">--}}
            {{--<div class="container">--}}
                {{--<p style="opacity: 0.5" class="text-left text-white">© 2018 GoParty.pl - Patryk Bejcer</p>--}}
            {{--</div>--}}
        {{--</div>--}}


    </div>
</footer>