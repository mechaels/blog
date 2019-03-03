@extends('layouts.app')

@section('content')
    <div class="content">
        <ul>
            @foreach ($users as $user)
                <li type = 'none'>
                    <a href="/allUsers/{{$user->id}}">
                        {{$user->name}}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection