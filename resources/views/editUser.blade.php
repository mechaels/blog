@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <div class="card border-0 bg-light">
            <div class="card-header">
                <h1>Change your information</h1>
            </div>
            <div class="card" style="margin-top:10px; margin-left:300px; margin-right:300px">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
            <form action = '/editProfile' method = 'POST' >
                @csrf
                <label style="margin-top:10px;">
                    Name:
                    <br>
                    <input type = 'text' name = 'name' size= '18px' class="form-control" style="width:155px;" value = '{{$currentUser->name}}'
                           required>
                </label>
                <br>
                <label>
                    Phone:
                    <br>
                    <input type = 'text' name = 'phone' class="form-control" style="width:155px;" value = '{{$currentUser->phone}}'>
                </label>
                <br>
                <button type="submit" class="btn btn-outline-primary btn-block">   Update    </button>
            </form>
            </div>
        </div>
    </div>
@endsection