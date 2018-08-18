@extends('layouts.app')

@section('title', 'Wyszukiwarka Klubów')

@section('content')

    <div class="container">
    </div>
        <router-view name="clubs"></router-view>
        <router-view></router-view>
    </div>

@endsection

