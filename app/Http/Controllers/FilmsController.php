<?php

namespace App\Http\Controllers;

use App\Country;
use App\Films;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FilmsController extends Controller
{

    public function store(Request $request)
    {
        $film = Films::find($request->name);

        if($film->count() < 1){
            $path = $request->file('poster')->store('uploads', 'public');

            Films::create([
                'name' => $request->name,
                'year'=>$request->year,
                'actors'=>$request->actors,
                'countries_id'=>$request->country,
                'users_id' => Auth::id(),
                'poster' => $path
            ]);
        }
        return redirect('/home');

    }

    public function addFilms()
    {
        $countries = Country::all();
        return view('newFilm', compact('countries'));
    }
}
