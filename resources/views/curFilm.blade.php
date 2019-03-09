@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <div class="card border-0 bg-light">
            <div class="card-header">
                <h1>{{$film->name}}</h1>
            </div>
            <div class="card-body text-center">
                <img class="rounded float-left" src="{{asset('/storage/' . $film->poster)}}" width = '300px' height = '300px'>
                <p><b>Country:</b> {{$film->country}}</p>
                <p><b>Year:</b>  {{date('d F Y', strtotime($film->year))}}</p>
                <p><b>Actors:</b>  {{$film->actors}}</p>
                <p><b>Added by:</b>  {{$film->user}}</p>
            </div>
        </div>
    </div>
@endsection