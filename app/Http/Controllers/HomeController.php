<?php

namespace App\Http\Controllers;

use App\Country;
use App\Films;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    //Профиль пользователя
    public function index()
    {
        $id = Auth::id();
        $film = new Films();
        $films = $film->current($id);
        return view('home', compact('films'));
    }
}
