@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <div class="card border-0 bg-light">
        <div class="card-header">
            <h1>Last added films</h1>
        </div>
        <div class="row col-md-8" style="margin-left:17%">
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
        </div>
            <div class="card-footer border-0 bg-light" style="margin-left:35%; margin-top:20px;">{{ $films->links() }}</div>
        </div>
    </div>
@endsection
