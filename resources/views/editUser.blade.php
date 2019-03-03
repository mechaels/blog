@extends('layouts.app')

@section('content')
    <div class="col-lg-5 col-md-3 col-sm-3 col-xs-6 ">
        <div class="top-cover center-block ">
            <h3>Change your information:</h3>
            <form action = '/editProfile' method = 'POST' >
                @csrf
                <label>
                    Name:
                    <br>
                    <input type = 'text' name = 'name' size= '18px' class="form-control" style="width:155px;" value = '{{$currentUser->name}}'>
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
@endsection