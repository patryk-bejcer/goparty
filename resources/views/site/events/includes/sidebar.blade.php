@section('css')
    @parent

    <link rel="stylesheet" href="{{asset('css/nouislider.min.css')}}">

    <style>
        .noUi-horizontal .noUi-handle {
            width: 18px;
            height: 18px;
            left: -17px;
            top: -7px;
            border-radius: 15px;
        }

        .noUi-handle:after, .noUi-handle:before {
            display: none;
        }

        .noUi-handle:after, .noUi-handle:before {
            display: none;
        }

        .noUi-target {
            background: rgba(255,255,255,0.7);
            border-radius: 4px;
            border: 1px solid #D3D3D3;
            box-shadow: inset 0 1px 1px #F0F0F0, 0 3px 6px -5px #BBB;
            padding-right: 15px;
            box-shadow: none;
            border: 0;
            height: 4px;
        }

        .noUi-connect, .noUi-origin {
            will-change: transform;
            position: absolute;
            z-index: 1;
            top: 0;
            left: 0;
            height: 4px;
            width: 100%;
            -ms-transform-origin: 0 0;
            -webkit-transform-origin: 0 0;
            transform-origin: 0 0;
        }
        .noUi-connect {
            background: #DE29A0;
        }
    </style>
@stop

<form method="GET" action="{{ url('/')  }}">
    <div class="row">

        <div class="col-12 music-types">

            <h5 class="mb-3">Cena biletu</h5>

            <div class="row mb-3">
                <div class="col-1">
                    <div class="mt-1">od</div>
                </div>
                <div class="col-3 pr-0">
                    <input type="number" min="0" max="50" step="1" id="input-number1" class="form-control p-0 pt-1 pb-1 mt-0 pl-3">
                </div>
                <div class="col-1 pl-2 mt-1">zł</div>

                <div class="col-1">
                    <div class="mt-1">do</div>
                </div>
                <div class="col-3 pr-0">
                    <input type="number" min="0" max="50" step="1" id="input-number2" class="form-control p-0 pt-1 pb-1 mt-0 pl-3" >
                </div>
                <div class="col pl-2 mt-1">zł</div>
            </div>
            <div id="html5"></div>
            <hr>
        </div>

        <div class="col-12">
            <h5>Selekcja</h5>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Tak
                </label>
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Nie
                </label>
            </div>
            <hr class="mt-0">
        </div>



        <div class="col-12 ">
            <h5>Ocena</h5>
            <div class="form-check">
                <label class="form-check-label">
                    <input name="music_types[]" class="form-check-input" type="radio" value="">
                    2 gwiazdki i więcej
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input name="music_types[]" class="form-check-input" type="radio" value="">
                    3 gwiazdki i więcej
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input name="music_types[]" class="form-check-input" type="radio" value="">
                    4 gwiazdki i więcej
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input name="music_types[]" class="form-check-input" type="radio" value="">
                    5 gwiazdek
                </label>
            </div>

            <hr>
        </div>



        {{--<div class="col-12">--}}
            {{--<h5>Wstęp</h5>--}}
            {{--<div class="row mt-3">--}}
                {{--<div class="col-1">--}}
                    {{--<div class="mt-1">od</div>--}}
                {{--</div>--}}
                {{--<div class="col-4 pr-0">--}}
                    {{--<input type="text" class="form-control pt-1 pb-1" placeholder="18 lat">--}}
                {{--</div>--}}

            {{--</div>--}}
            {{--<hr>--}}
        {{--</div>--}}


        <div class="col-12 music-types">
            <h5>Rodzaj muzyki</h5>
            @foreach($musicTypes as $music_type)
                <div class="form-check">
                    <label class="form-check-label">
                        <input name="music_types[]" class="form-check-input" type="checkbox" value="{{$music_type->id}}">
                        {{$music_type->name}}
                    </label>
                </div>
            @endforeach

            <hr>
        </div>



        <div class="col-12">
            <b><input type="submit" value="Filtruj imprezy" class="btn pull-right"></b>
        </div>


    </div>
</form>

@section('scripts')
    @parent

    <script src="{{asset('js/nouislider.min.js')}}"></script>


    <script>
        var select = document.getElementById('input-number1');

        // Append the option elements
        for ( var i = 0; i <= 50; i++ ){

            var option = document.createElement("option");
            option.text = i;
            option.value = i;

            select.appendChild(option);
        }

        var html5Slider = document.getElementById('html5');

        noUiSlider.create(html5Slider, {
            start: [ 0, 50 ],
            connect: true,
            range: {
                'min': 0,
                'max': 50
            }
        });

        var inputNumber = document.getElementById('input-number2');

        html5Slider.noUiSlider.on('update', function( values, handle ) {

            var value = values[handle];

            if ( handle ) {
                inputNumber.value = Math.round(value);
            } else {
                select.value = Math.round(value);
            }
        });

        select.addEventListener('change', function(){
            html5Slider.noUiSlider.set([this.value, null]);
        });

        inputNumber.addEventListener('change', function(){
            html5Slider.noUiSlider.set([null, this.value]);
        });
    </script>


@stop