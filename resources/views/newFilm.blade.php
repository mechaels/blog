@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="top-cover center-block ">
    <h3>Enter movie info:</h3>
    <form action = '/newFilm' method = 'POST' enctype="multipart/form-data">
        @csrf
        <label>
            Name:
            <br>
            <input type = 'text' name = 'name' size= '18px' class="form-control" style="width:155px;">
        </label>
        <br>
        <label>
            Year:
            <br>
            <input type="date" name="year" class="form-control" style="width:155px;">
        </label>
        <br>
        <label>
            Actors:
            <br>
            <input type = 'text' name = 'actors' class="form-control" style="width:155px;">
        </label>
        <br>
        <label>
            Country:
                <select name = 'country' class="form-control" style="width:155px;">
                    @foreach ($countries as $country)
                        <option value = '{{$country -> id}}'>{{$country -> name}}</option>
                    @endforeach
                </select>
        </label>
        <br>
        <label>
            Poster:
        <br>
        <input type = 'file' name = 'poster'>
        </label>
        <br>
        <button type="submit" class="btn btn-outline-primary btn-block">   Add    </button>
    </form>
        </div>
    </div>
@endsection