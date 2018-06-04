@section('css')
    @parent
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css"/>
@stop

</div>

<div class="mask">

<div class="search-top-bg">

<div class="container">

<form method="GET" action="{{ url('/search-events')  }}">
    <div class="row">
        <div id="events-search-form">
            <h2>Znajdź imprezę dla siebie</h2>
            <div class="row">
                <div class="col-10 offset-1">
                    <div class="row p-0 pb-0 search-form-body">
                        <div class="col-md-4">
                            <city-search-box :survey-data="{{json_encode(app('request')->city) }}"> </city-search-box>
                        </div>
                        <div class='col-md-3' style="border-right: 1px solid #AAA !important;">
                            <div class="form-group">
                                <div class="input-group date" id="datetimepickerstart" data-target-input="nearest">
                                    @if (!$errors->has('start_date'))
                                        <span class="text-after-date">od</span>
                                    @endif
                                    <input name="start_date" type="text" class="form-control datetimepicker-input"
                                           data-target="#datetimepickerstart" data-toggle="datetimepicker"

                                           @if (app('request')->start_date)
                                           value="{{ app('request')->start_date }}"
                                            @endif
                                    />

                                        @if ($errors->has('start_date'))
                                            <span class="date-error invalid-feedback">Podaj poprawną datę</span>
                                        @endif

                                    <div class="input-group-append" data-target="#datetimepickerstart"
                                         data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='col-md-3'>
                            <div class="form-group">
                                <div class="input-group date" id="datetimepickerend" data-target-input="nearest">
                                    @if (!$errors->has('end_date'))
                                        <span class="text-after-date">do</span>
                                    @endif
                                    <input name="end_date" type="text" class="form-control datetimepicker-input"
                                           data-target="#datetimepickerend" data-toggle="datetimepicker"

                                           @if (app('request')->end_date)
                                           value="{{ app('request')->end_date }}"
                                            @endif
                                    />

                                        @if ($errors->has('end_date'))
                                            <span class="date-error invalid-feedback">Podaj poprawną datę</span>
                                        @endif


                                    <div class="input-group-append" data-target="#datetimepickerend"
                                         data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='col-md-2 pr-0 pl-0'>
                            <input type="submit" class="btn btn-success" value="Szukaj imprez">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

</div>

</div>

</div>

    <div class="container">


@section('scripts')
    @parent


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js"></script>
    <script type="text/javascript" src="{{asset('js/moment/locale_pl.js')}}"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha18/js/tempusdominus-bootstrap-4.min.js"></script>

    <script>

        function addDays(dateObj, numDays) {
            dateObj.setDate(dateObj.getDate() + numDays);
            return dateObj;
        }

        $(function () {
            $('#datetimepickerstart').datetimepicker({
                format: 'YYYY-MM-DD',
                useCurrent: true,
                defaultDate: new Date(),
            });
            $('#datetimepickerend').datetimepicker({
                format: 'YYYY-MM-DD',
                useCurrent: true,
                defaultDate: addDays(new Date(), 21),
                // defaultDate: "2018-06-23"
            });
            $("#datetimepickerstart").on("change.datetimepicker", function (e) {
                $('#datetimepickerend').datetimepicker('minDate', e.date);
            });
            $("#datetimepickerend").on("change.datetimepicker", function (e) {
                $('#datetimepickerstart').datetimepicker('maxDate', e.date );
            });
        });

        $( ".date-error" ).click(function() {
            $( ".date-error" ).remove();
            $('#datetimepickerstart').datetimepicker(show.datetimepicker);
        });
    </script>

@endsection