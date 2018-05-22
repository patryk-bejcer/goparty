<h3>Wyszukiwarka:</h3>

<form method="GET" action="{{ url('/search-events')  }}">
    {{--@csrf--}}

    <label class="mb-2" for="">Data imprezy:</label>
    <div class="form-group row">
        <label for="example-date-input" class="col-2 col-form-label">Od</label>
        <div class="col-10">
            <input class="form-control" name="start_date" type="date" value="2018-05-01"
                   id="example-date-input">
        </div>
        <label for="example-date-input" class="col-2 col-form-label">Do</label>
        <div class="col-10">
            <input class="form-control" name="end_date" type="date" value="2018-09-01"
                   id="example-date-input">
        </div>

        <city-search-box></city-search-box>

        <div class="col-10">
            <input class="form-control btn btn-secondary mt-3" type="submit" value="Szukaj">
        </div>

    </div>
</form>