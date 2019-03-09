@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <div class="card border-0 bg-light">
            <div class="card-header">
                <h1>Last added films</h1>
            </div>
            <div class="col-md-4" style="margin-top:10px; margin-left:380px;">
            <div class="card">
    <form action = '/newFilm' method = 'POST' enctype="multipart/form-data">
        @csrf
        <label style="margin-top:10px;">
            Name:
            <br>
            <input type = 'text' name = 'name' size= '18px' class="form-control" style="width:155px;"
                   required oninvalid="this.setCustomValidity('Введите название фильма')" oninput="setCustomValidity('')"
            >
            @if ($errors->has('name'))
                <span class="help-block text-danger">
                      {{ $errors->first('name', 'Фильм с таким названием уже существует') }}
                </span>
            @endif
        </label>
        <br>
        <label>
            Year:
            <br>
            <input type="date" name="year" class="form-control" style="width:155px;"
                   required oninvalid="this.setCustomValidity('Введите год выпуска')" oninput="setCustomValidity('')">
        </label>
        <br>
        <label>
            Actors:
            <br>
            <input type = 'text' name = 'actors' class="form-control" style="width:155px;">
        </label>
        <br>
        <label>
            Country:
                <select name = 'country' class="form-control" style="width:155px;"
                        required oninvalid="this.setCustomValidity('Выполните комманду php artisan command:AddCountries')" oninput="setCustomValidity('')">
                    @foreach ($countries as $country)
                        <option value = '{{$country -> id}}'>{{$country -> name}}</option>
                    @endforeach
                </select>
        </label>
        <br>
        <label>
            Poster:
        </label>
        <br>
            <input type = 'file' name = 'poster' style="width: 125px;" onchange="this.style.width = '180px';"
                   required oninvalid="this.setCustomValidity('Выберите постер')" oninput="setCustomValidity('')">
                <br>
                @if ($errors->has('poster'))
                    <span class="help-block text-danger">
                          {{ $errors->first('poster', 'Неверный формат файла') }}
                    </span>
                @endif
        <br>
        <button type="submit" class="btn btn-outline-primary btn-block">   Add    </button>
    </form>
            </form>
            </div>
        </div>
    </div>
    </div>
@endsection