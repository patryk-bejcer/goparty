<div class="col-md-3">
    <div class="card text-white bg-dark mb-3 user-left-menu">
        <div class="card-header">
            <b>Panel użytkownika</b>
            <img class="img-fluid mt-2" src="https://www.w3schools.com/howto/img_avatar.png" alt="">
            <h4 class="mt-3 mb-0">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h4>
        </div>
        <ul class="list-group list-group-flush ">
            <a href=""><li class="list-group-item bg-dark "> <i class="fa fa-music" aria-hidden="true"></i>  Wydarzenia</li></a>
            <a href=""><li class="list-group-item bg-dark"><i class="fa fa-headphones" aria-hidden="true"></i>  Ulubine kluby</li></a>
            <a href=""><li class="list-group-item bg-dark"><i class="fa fa-users" aria-hidden="true"></i>
                    Znajomi</li></a>
            @role('owner')
            <a href="{{url('/dashboard/clubs')}}"><li class="list-group-item bg-dark"><i class="fa fa-microphone" aria-hidden="true"></i>
                    Zarządzaj klubem</li></a>
            @endrole
            <a href=""><li class="list-group-item bg-dark"><i class="fa fa-gear" aria-hidden="true"></i>
                    Ustawienia konta</li></a>
        </ul>
    </div>
</div>