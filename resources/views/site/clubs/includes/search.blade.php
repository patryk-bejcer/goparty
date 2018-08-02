@section('css')
    @parent
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css"/>
    <style>
        #events-search-form .search-form-body #map{
            border-right: none !important;
        }
    </style>
@stop

</div>

<div class="mask">

<div class="search-top-bg">

<div class="container">

<form method="GET" action="{{ url('/search-clubs')  }}">
    <div class="row">
        <div id="events-search-form">
            <h2>Znajdź klub dla siebie</h2>
            <div class="row">
                <div class="col-10 offset-1">
                    <div class="row p-0 pb-0 search-form-body">
                        <div class="col-md-10">
                            <city-search-box :survey-data="{{json_encode(app('request')->city) }}"> </city-search-box>
                        </div>

                        <div class='col-md-2 pr-0 pl-0'>
                            <input type="submit" class="btn btn-success" value="Szukaj klubów">
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