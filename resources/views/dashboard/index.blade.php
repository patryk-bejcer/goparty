@extends('layouts.app')

@section('content')
    <div class="container" data-scroll = 'scroll'>
        <div class="row justify-content-center">
            @include('dashboard.includes.sidebar')
            <div class="col-md-9">
                <div class="card text-white bg-dark mb-3">
                    <div class="card-header" >
                        <b>Witaj w panelu użytkownika</b>
                    </div>
                    <div class="card-body" >
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci assumenda, ducimus inventore ipsam nemo saepe. Architecto et nesciunt possimus quam quis ullam veritatis! Aliquid laborum maiores optio rerum temporibus, ut!</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci assumenda, ducimus inventore ipsam nemo saepe. Architecto et nesciunt possimus quam quis ullam veritatis! Aliquid laborum maiores optio rerum temporibus, ut!</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci assumenda, ducimus inventore ipsam nemo saepe. Architecto et nesciunt possimus quam quis ullam veritatis! Aliquid laborum maiores optio rerum temporibus, ut!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
