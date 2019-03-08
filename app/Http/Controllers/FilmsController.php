<?php

namespace App\Http\Controllers;

use App\Country;
use App\Films;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FilmsController extends Controller
{

    //Добавляем фильм
    public function store(Request $request)
    {
        //$film = Films::find($request->name);

        $rules = array(
            'name' => 'required|unique:films',
            'poster' => 'required',
            'country' => 'required',
            'year' => 'required'
        );

        $validation = Validator::make($request->all(), $rules);

        if ($validation->fails())
        {
            return redirect('newFilm')->withErrors($validation);
        }

        //Проверка, что такого названия еще нет в базе
        //if($film->count() < 1){
            $path = $request->file('poster')->store('uploads', 'public');

            Films::create([
                'name' => $request->name,
                'year'=>$request->year,
                'actors'=>$request->actors,
                'countries_id'=>$request->country,
                'users_id' => Auth::id(),
                'poster' => $path
            ]);
        //}
        return redirect('home');

    }

    //Страница для добавления фильма
    public function addFilms()
    {
        $countries = Country::all();
        return view('newFilm', compact('countries'));
    }
}
