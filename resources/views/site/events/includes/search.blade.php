@section('css')
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css"/>
@endsection

<form method="GET" action="{{ url('/search-events')  }}">
    <div class="row">
        <div id="events-search-form">
            <h2>Wyszukiwarka imprez</h2>
            <div class="row">
                <div class="col-10 offset-1">
                    <div class="row p-0 pb-0 search-form-body">
                        <div class="col-md-4">
                            <city-search-box></city-search-box>
                        </div>
                        <div class='col-md-3' style="border-right: 1px solid #AAA !important;">
                            <div class="form-group">
                                <div class="input-group date" id="datetimepickerstart" data-target-input="nearest">
                                    <span class="text-after-date">od</span>
                                    <input name="start_date" type="text" class="form-control datetimepicker-input"
                                           data-target="#datetimepickerstart" data-toggle="datetimepicker"/>

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
                                    <span class="text-after-date">do</span>
                                    <input name="end_date" type="text" class="form-control datetimepicker-input"
                                           data-target="#datetimepickerend" data-toggle="datetimepicker"/>
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

@section('scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js"></script>
    <script type="text/javascript" src="{{asset('js/moment/locale_pl.js')}}"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha18/js/tempusdominus-bootstrap-4.min.js"></script>
    <script>
        $(function () {
            $('#datetimepickerstart').datetimepicker({
                format: 'YYYY-MM-DD',
                useCurrent: true,
            });
            $('#datetimepickerend').datetimepicker({
                format: 'YYYY-MM-DD',
                useCurrent: true,
                // defaultDate: "2018-06-23"
            });
            $("#datetimepickerstart").on("change.datetimepicker", function (e) {
                $('#datetimepickerend').datetimepicker('minDate', e.date);
            });
            $("#datetimepickerend").on("change.datetimepicker", function (e) {
                $('#datetimepickerstart').datetimepicker('maxDate', e.date);
            });
        });
    </script>
@endsection