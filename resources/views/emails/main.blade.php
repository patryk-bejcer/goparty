<head>



<style>
    body{
        background-image: url({{asset('img/bg.jpg')}});
        background-position: center;
        color: white;
    }
    .col-auto{
        width: 80%;
        margin: auto;
        text-align: center;
        padding: 30px;
    }
    a{
        text-decoration: none;
        color: white;
        padding: 5px 10px 5px 10px;
        background-color: black;
        border-radius: 2px;
        transition: 200ms;
    }
    a:hover{
        opacity: 0.7;
    }

</style>
</head>

<body>
    <div class="col-auto">
        <h1> witaj użytkowniku {{$club_user->first_name}} {{$club_user->last_name}} </h1>
        <p> Właśnie utwożyłeś klub o nazwie {{$club->official_name}}</p>
        <a href="{{url('clubs/'. $club->id)}}"> Zobacz klub </a>
        <br>
        <div class="footer">
            <p style="font-size: 10px">
                Dziękujemy że jesteś z nami
            </p>
        </div>


    </div>



</body>