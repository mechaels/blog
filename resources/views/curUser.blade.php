@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <div class="card border-0 bg-light">
            <div class="card-header">
                <h1>It is {{$user->name}}'s profile</h1>
            </div>
            <div class="card-body text-center">
                <h4 class="text-right"> Current grade: {{$avgRate}} </h4>
                <h4 class="text-right">
                    @if(count($rating) > 0)
                        <h4 class="text-right text-success">You have already rated</h4>
                    @else
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
                </h4>
                <h3>List of films:</h3>
                <div class="row col-md-8" style="margin-left:17%">
                    @foreach ($films as $film)
                        <div class="col-md-3" style="margin-top:10px">
                            <div class="card">
                                <img class="card-img-top" src="{{asset('/storage/' . $film->poster)}}" width = '150px' height = '150px'>
                                <div class="card-body text-center">
                                    {{$film->name}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="card border-0 bg-light" style="margin-top:50px; margin-left:50px; margin-right:500px">
                <h5 class="text-left" style="margin-bottom:20px;"><b>Comments:</b></h5>
                    @foreach ($posts as $post)
                        <p class="text-left" style="margin-left:50px;">{{$post->text}}</p>
                        <p class="text-right text-muted" style="margin-left:50px;">Author: {{$post->name}}</p>
                    @endforeach
                <form action="/allUsers" method="post">
                    @csrf
                    <p><b>New comment:</b></p>
                    <textarea class = 'form-control' name="text" maxlength="120"
                              required oninvalid="this.setCustomValidity('Введите комментарий')" oninput="setCustomValidity('')"></textarea>
                    <input type = 'hidden' name = 'id' value='{{$user->id}}'>
                    <p><button type="submit" class="btn btn-outline-primary btn-block">   Add    </button></p>
                </form>
                </div>
        </div>
        </div>
    </div>
@endsection