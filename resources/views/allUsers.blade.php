@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <div class="card border-0 bg-light">
            <div class="card-header">
                <h1>List of users</h1>
            </div>
            <div class="card-body text-center">
            @foreach ($users as $user)
                <h3>
                    <a href="/allUsers/{{$user->id}}">
                        {{$user->name}}
                    </a>
                </h3>
            @endforeach
            </div>
    </div>
    </div>
@endsection