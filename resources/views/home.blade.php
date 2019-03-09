@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <div class="card border-0 bg-light">
            <div class="card-header">
                <h1>It is your films</h1>
            </div>
            <div class="row col-md-8" style="margin-left:17%">
                @if($films->count() != 0)
                    @foreach ($films as $film)
                        <div class="col-md-3" style="margin-top:10px">
                            <div class="card">
                                <img class="card-img-top" src="{{asset('/storage/' . $film->poster)}}" width = '150px' height = '150px'>
                                <div class="card-body text-center">
                                    <a href="/allFilms/{{$film->id}}">
                                        {{$film->name}}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="card-body text-center">
                        <h3 class="text-danger">You haven't added any films yet </h3>
                        <h3 class="text-danger">Choose 'New Film' for add</h3>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
