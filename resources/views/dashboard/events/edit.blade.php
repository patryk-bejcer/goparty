@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('dashboard.includes.sidebar')
            <div class="col-md-9">
                <div class="card text-white bg-dark mb-3">
                    <div class="card-header">
                        <b>Edycja wydarzenia w klubie {{$club->official_name}}</b>
                    </div>
                    <div class="card-body">

                        <form method="POST" action="{{ url('/dashboard/clubs/'. $club->id .'/events/'. $event->id) }}">

                            @csrf
                            {{method_field('PUT')}}

                            @if(!empty($errors->first()))
                                <div class="row col-lg-12">
                                    <div class="alert alert-danger">
                                        <span>{{ $errors->first() }}</span>
                                    </div>
                                </div>
                            @endif

                            <div class="form-group row">

                                <div class="col-md-12">
                                    <label for="city" style="" class="">{{ __('Pełna nazwa wydarzenia *') }}</label>
                                    <input id="title" type="text"
                                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           name="title"
                                           value="{{$event->title}}" required autofocus>

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                {{--<div class="col-md-6 mt-2 mb-0">--}}
                                {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum eligendi nam nesciunt odit officia quasi, sit suscipit! Aut,  vitae?</p>--}}
                                {{--</div>--}}

                            </div>

                            <div class="form-group row">
                                {{--<label for="official_name" class="col-md-2 col-form-label text-md-right">{{ __('First name') }}</label>--}}
                                <div class="col-md-6">
                                    <label for="start_date" style="" class="">{{ __('Rozpoczęcie imprezy *') }}</label>
                                    <input id="start_date" type="date"
                                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           name="start_date" value="{{$event->start_date}}"
                                           placeholder="Wprowadź adres start_date" required autofocus>

                                    @if ($errors->has('start_date'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('start_date') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label for="end_date" style="" class="">{{ __('Koniec imprezy *') }}</label>
                                    <input id="end_date" type="date"
                                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           name="end_date" value="{{$event->end_date}}"
                                           placeholder="Wprowadź adres end_date" required autofocus>

                                    @if ($errors->has('end_date'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('end_date') }}</strong>
                                    </span>
                                    @endif
                                </div>


                            </div>

                            <div class="form-group row">

                                <div class="col-md-12">
                                    <label for="description" style="" class="">{{ __('Opis wydarzenia') }}</label>
                                    <textarea rows="5" id="description" type="text"
                                              class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                              name="description"
                                              placeholder="Opis wydarzenia">{{$event->description}}"
                                    </textarea>

                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>

                            <hr>

                            <input type="hidden" name="club_id" value="{{$club->id}}">
                            <input type="hidden" name="user_id" value="{{Auth::id()}}">

                            <div class="form-group row mb-0">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Zapisz zmiany >>') }}
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
