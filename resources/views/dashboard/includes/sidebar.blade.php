<div class="col-md-3 pr-md-1" id="sidebar">

    <div class="card text-white mb-3 user-left-menu">

        <div class="card-header" style="padding-bottom: 0px;">
            <p class="text-center mb-2 "><b class="text-center">Panel użytkownika</b></p>

            <div class="rotate-square mt-5 mb-5">
                @if (!Auth::user()->getAvatar->isEmpty())
                    <img class="img-fluid mt-2"
                         src="{{url('/uploads/users/avatars/' . Auth::user()->getAvatar->last()->src)}}" alt="">
                @else
                    <img class="img-fluid mt-2" src="{{url('/img/avatar.png')}}"
                         alt="{{Auth::user()->first_name}} {{Auth::user()->last_name}}">
                @endif

            </div>
            <h4 class="mt-3 mb-0 text-center">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h4>

                    <h5 class="text-center mt-2"><small><span class="badge-dark p-1 mt-1 text-center">
                    @role('owner')
                        właściciel
                    @else
                        użytkownik
                    @endrole
                    </span></small></h5>


            <hr>
        </div>

        <div class="list-group pb-4">

            <a class="dropdown-item list-group-item collapsed
{{ Request::path() == 'dashboard/notifications' ? 'active' : '' }}
" href="{{route('user.notifications')}}">
                <i class="fa fa-bell"></i>
                {{ __('Powiadomienia') }}</a>

            @role('owner')
            <a href="#menu1" class="list-group-item collapsed" data-toggle="collapse" data-parent="#sidebar"
               aria-expanded="false"><i class="fa fa-hospital-o"></i> <span class="hidden-sm-down"> Kluby</span>
            </a>
            <div class="collapse pl-3" id="menu1">
                <a href="{{url('/dashboard/clubs')}}" class="list-group-item child" data-parent="#menu1"><i class="fa fa-list" aria-hidden="true"></i>Lista
                    klubów</a>
                <a href="{{url('/dashboard/clubs/create')}}" class="list-group-item child" data-parent="#menu1"><i class="fa fa-plus" aria-hidden="true"></i>Dodaj
                    nowy klub</a>
            </div>
            {{--<a class="dropdown-item list-group-item collapsed" href="{{url('dashboard/attendance')}}">--}}
                {{--<i class="fa fa-music"></i>--}}
                {{--{{ __('Imprezy u Ciebie') }}</a>--}}
            @endrole

            @role('user')

            <a class="dropdown-item list-group-item collapsed
                 {{ Request::path() == 'dashboard/attendance' ? 'active' : '' }}
                    " href="{{url('dashboard/attendance')}}">
                <i class="fa fa-music"></i>
                {{ __('Imprezy') }}</a>

            <a class="dropdown-item list-group-item collapsed" href="{{url('dashboard/attendance')}}">
                <i class="fa fa-hospital-o"></i>
                {{ __('Ulubione kluby') }}</a>
            <a class="dropdown-item list-group-item collapsed" href="{{url('dashboard/attendance')}}">
                <i class="fa fa-users"></i>
                {{ __('Znajomi') }}</a>
            @endrole
            <a class="dropdown-item list-group-item collapsed" href="{{url('dashboard/attendance')}}">
                <i class="fa fa-picture-o"></i>
                {{ __('Zdjęcia') }}</a>


            <a class="dropdown-item list-group-item collapsed
    {{ Request::path() == 'dashboard/profile/edit' ? 'active' : '' }}
                    " href="{{route('user.edit.profile')}}">
                <i class="fa fa-gear"></i>
                {{ __('Profil') }}</a>

            <a class="dropdown-item list-group-item collapsed" href="{{url('dashboard/attendance')}}">
                <i class="fa fa-sign-out"></i>
                {{ __('Wyloguj się') }}</a>

            {{--<a href="#menu2" class="list-group-item collapsed" data-toggle="collapse" data-parent="#sidebar"--}}
            {{--aria-expanded="false"><i class="fa fa-music"></i> <span class="hidden-sm-down"> Wydarzenia</span> </a>--}}


            {{--<div class="collapse" id="menu2">--}}
            {{--<a href="{{url('dashboard/attendance')}}" class="list-group-item" data-parent="#menu1">Moje wydarzenia</a>--}}
            {{--</div>--}}


            {{--<a href="{{route('user.dashboard.index')}}" class="list-group-item collapsed" data-parent="#sidebar"><i class="fa fa-gear"></i> <span--}}
            {{--class="hidden-sm-down">Ustawienia konta</span></a>--}}

        </div>


    </div>


</div>


