@extends('layouts.app')

@section('content')


            <div class="content">
                <div class="row justify-content-center">
                    <ul>
                        @foreach ($films as $film)
                            <li type = 'none'>
                                <img src="{{asset('/storage/' . $film->poster)}}" width = '150px'>
                            </li>
                            <li type = 'none'>{{$film->name}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

@endsection
