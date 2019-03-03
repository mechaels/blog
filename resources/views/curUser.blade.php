@extends('layouts.app')

@section('content')
    <div class="row justify-content-center ">
        <div class="top-cover center-block ">
            It is {{$user->name}}'s profile
            <br>
            Current grade: {{$avgRate}}
            @if(count($rating) > 0)
                <br>
                You have already rated
            @else
                <br>
                Choose your grade:
                <form action="/allUsers1" method="post">
                    @csrf
                    <input name="rate" type="radio" value="1">
                    <input name="rate" type="radio" value="2">
                    <input name="rate" type="radio" value="3">
                    <input name="rate" type="radio" value="4">
                    <input name="rate" type="radio" value="5" checked>
                    <input type = 'hidden' name = 'id' value='{{$user->id}}'>
                    <button type="submit" class="btn btn-outline-primary">   Send    </button>
                </form>
            @endif
            <br>
            List of films:
            <br>
            <ul>
                @foreach ($films as $film)
                    <li type = 'none'>
                        <img src="{{asset('/storage/' . $film->poster)}}" width = '150px'>
                    </li>
                    <li type = 'none'>{{$film->name}}</li>
                @endforeach
            </ul>
            <br>
            <p><b>Comments:</b></p>
            <ul>
                @foreach ($posts as $post)
                    <li type = 'none'>{{$post->text}}</li>
                    <br>
                @endforeach
            </ul>
            <form action="/allUsers" method="post">
                @csrf
                <p><b>New comment:</b></p>
                <textarea class = 'form-control' name="text"></textarea>
                <input type = 'hidden' name = 'id' value='{{$user->id}}'>
                <p><button type="submit" class="btn btn-outline-primary btn-block">   Add    </button></p>
            </form>
        </div>
    </div>
@endsection