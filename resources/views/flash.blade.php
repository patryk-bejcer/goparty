<html>
<head>
    <title>Flash Message</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css"
          integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
</head>
</html>

<div class="container" id="app">
    <flash message="{{ session('flash') }}"></flash>
    <div class="row justify-content-center mt-4">
        <div class="col-4">
            <form class="form-control m-t-20" action="{{url('/flashButton')}}" method="get">
                <div class="form-group">
                    <label for="message">Message</label>
                    <input type="text" class="form-control" name="message">
                </div>
                <button class="btn btn-primary" type="submit">Send Flash</button>
            </form>

        </div>
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>