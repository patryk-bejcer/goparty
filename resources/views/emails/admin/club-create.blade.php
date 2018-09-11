<h2> Użytkownik {{$club_user->first_name}} dodał nowy klub i prosi o zatwiedzenie klubu. </h2>
<h4>Nazwa klubu: {{$club->official_name}}</h4>
<h4>Adres e-mail: {{$club->email}}</h4>
<a href="admin/clubs-confirm/{{$club->id}}/edit">Zatwierdź klub</a>
