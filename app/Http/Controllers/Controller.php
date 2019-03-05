<?php

namespace App\Http\Controllers;

use App\Films;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //Главная страница
    public function index(){
        $film = new Films();
        $films = $film->lastTwenty();
        return view('welcome', compact('films'));
    }
}
