<h1>{{$club_user->first_name}} Twój klub został zatwierdzony </h1>
<p> Zatwierdzono pomyślnie twój klub o nazwie {{$club->official_name}}, Twoje prawa na portalu uległy zmianie, teraz jesteś "właścicielem"
Daje ci to wachlarz nowych możliwości, takich jak zarządzanie klubem, dodawanie imprez itp.
    </p>
<a href="{{url('clubs/'. $club->id)}}"> Zobacz klub </a>
</p>
{{--<a href="{{url('clubs/'. $club->id)}}"> Zobacz klub </a>--}}
<br>
<div class="footer">
    <p style="font-size: 10px">
        Dziękujemy że jesteś z nami
    </p>
</div>