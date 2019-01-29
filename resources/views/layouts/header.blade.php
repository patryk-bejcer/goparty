

<nav class="navbar navbar-expand-md navbar-light fixed-top" id="navigation">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img class="navbar-img" src="{{asset('img/logo.png')}}"alt="GoParty.pl">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav mr-auto">
                <li> <a class="nav-link" href="#" >Start</a> </li>

                <li> <a class="nav-link" href="{{ route('all-events') }}">Imprezy</a> </li>
                <li> <a class="nav-link" href="{{ url('clubs/#clubs') }}">Kluby</a> </li>
                {{--<li> <a class="nav-link" href="#" >Artyści</a> </li>--}}
                <li> <a class="nav-link" href="{{ route('users.index' ) }}">Społeczność</a> </li>
                {{--<li> <a class="nav-link" href="#">Muzyka</a> </li>--}}
                <li><a class="nav-link" href="{{ route('clubs.create') }}">{{ __('Dodaj klub') }}</a></li>

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li><a class="nav-link" href="{{ route('login') }}">{{ __('Zaloguj się') }}</a></li>
                    <li><a class="nav-link register-btn" href="{{ route('register') }}">{{ __('Załóż konto') }}</a></li>
                @else
                    <li class="nav-item dropdown user-menu">
                        <a id="navbarDropdown" class=" nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fa fa-user" aria-hidden="true"></i> <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">


                            <!-- Tabs for users -->
                            <a class="dropdown-item" href="{{url('dashboard/notifications')}}">{{ __('Powiadomienia') }}</a>
                            <a class="dropdown-item" href="{{route('user.edit.profile')}}">{{ __('Profil') }}</a>
                            <a class="dropdown-item" href="{{url('dashboard/attendance')}}">{{ __('Weźmiesz udział') }}</a>
                            {{--<a class="dropdown-item" href="{{url('dashboard/attendance')}}">{{ __('Ulubione kluby') }}</a>--}}
                            <!-- End tabs for owner -->

                            <!-- Tabs for owner -->
                            @role('owner')
                            <a class="dropdown-item" href="{{url('/dashboard/clubs')}}">{{ __('Zarządzanie klubem') }}</a>
                            @endrole
                            <!-- End tabs for owner -->

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Wyloguj się') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    {{--<li class="nav-item dropdown"><i class="fa fa-bell ml-2 pr-2 mt-3" aria-hidden="true"></i></li>--}}
                @endguest

            </ul>
        </div>
    </div>
</nav>


