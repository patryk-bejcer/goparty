@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />
@endsection

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            @include('dashboard.includes.sidebar')
            <div class="col-md-9">
                <div class="card text-white bg-dark mb-3">
                    <div class="card-header">
                        <b>Dodawanie nowego imprezy w klubie {{$club->official_name}}</b>
                    </div>
                    <div class="card-body">

                        <form method="POST" class="pb-4" action="{{ route('events.store', ['club_id' => $club->id]) }}">

                            @csrf

                            {{--@if(!empty($errors->first()))--}}
                                {{--<div class="row col-lg-12">--}}
                                    {{--<div class="alert alert-danger">--}}
                                        {{--<span>{{ $errors->first() }}</span>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--@endif--}}

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="title" style="" class="">{{ __('Pełna nazwa imprezy *') }}</label>
                                    <input id="title" type="text"
                                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           name="title" value="{{ old('title') }}"
                                           placeholder="Wprowadź nazwe imprezy"  autofocus>

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-sm-5">
                                        <label>Data rozpoczęcia imprezy *</label>
                                        <div class="input-group date" id="datetimepicker" data-target-input="nearest">
                                            <input name="start_date" type="text" class="form-control datetimepicker-input" data-target="#datetimepicker" value="{{ old('start_date') }}" />
                                            <div class="input-group-append" data-target="#datetimepicker" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                            @if ($errors->has('start_date'))
                                                <span class="invalid-feedback">
                                                <strong>{{ $errors->first('start_date') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                </div>

                                <div class="col-md-2">
                                    <label for="admission">Wstęp od</label>
                                    <input name="admission" id="admission" class="form-control" type="number" min="0" max="25" placeholder="18" value="{{ old('admission') }}">
                                    @if ($errors->has('admission'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('admission') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="col-md-2">
                                    <label for="ticket_price">Cena biletu (zł)</label>
                                    <input name="ticket_price" id="ticket_price" class="form-control" type="number" min="0" max="200" placeholder="10" value="{{ old('ticket_price') }}">

                                    @if ($errors->has('ticket_price'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('ticket_price') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="col-md-3">
                                    <label for="selection" style="" class="">Selekcja na bramce</label>
                                    <select name="selection" id="selection" class="form-control">
                                        <option value="0">Nie</option>
                                        <option value="1">Tak</option>
                                    </select>

                                    @if ($errors->has('selection'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('selection') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-md-12">
                                    <label for="description" style="" class="">{{ __('Opis imprezy') }}</label>
                                    <textarea rows="5" id="description" type="text"
                                              class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                              name="description"
                                              placeholder="Opis imprezy *" >{{ old('description') }}</textarea>

                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-sm-6">
                                    <div class="form-group{{ $errors->has('event_img') ? ' has-error' : '' }}">
                                        <label for="">Plakat lub zdjęcie imprezy *</label>
                                        <input name="event_img" type="file" class="form-control upload-input mb-1"
                                               placeholder="Wybierz zdjęcie główne" accept=".jpg,.jpeg"
                                               onchange="loadFile(event)" multiple>

                                        @if ($errors->has('event_img'))
                                            <span class="help-block">
                            <small class="text-danger">{{ $errors->first('event_img') }}</small>
                        </span>
                                        @endif

                                    </div>
                                    <img class="img-fluid" id="output" src=""/>

                                </div>
                                <div class="col-sm-6">
                                    <label for="website">Strona www imprezy  </label>
                                    <div class="input-group date" id="datetimepicker" data-target-input="nearest">
                                        <input name="website" id="website" class="form-control" type="text" value="{{ old('website') }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary pull-right">
                                        Dodaj imprezę <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>

                            <input type="hidden" name="club_id" value="{{$club->id}}">
                            <input type="hidden" name="user_id" value="{{Auth::id()}}">

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js"></script>
    <script type="text/javascript" src="{{asset('js/moment/locale_pl.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha18/js/tempusdominus-bootstrap-4.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker').datetimepicker({
                locale: 'pl'
            });
        });

        let loadFile = function (event) {
            let output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endsection