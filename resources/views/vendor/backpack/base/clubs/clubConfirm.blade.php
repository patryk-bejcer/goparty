<form action="{{route('club.confirm', ['clubId' => $clubId ])}}" method="POST">
    @csrf
    <input type="submit" value="Confirm">
</form>