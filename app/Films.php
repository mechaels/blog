<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Films extends Model
{
    protected $fillable = [
        'name',
        'year',
        'actors',
        'users_id',
        'countries_id',
        'poster'
    ];

    public function country(){
        return $this->belongsTo('App\Country','countries_id','id');
    }

    public function user(){
        return $this->belongsTo('App\User','users_id','id');
    }

    //ФИльмы пользователя
    public function current($id){
        $films = DB::table('films')
            ->where('users_id', '=', $id)
            ->get();
        return $films;
    }

    //Последние 20 фильмов на главную страницу
    public function lastTwenty(){
        $films = DB::table('films')
            ->latest()
            ->limit(20)
            ->get();

        return $films;
    }

    //Ищем фильм по имени
    public static function find($name){
        $film = DB::table('films')
            ->select('id')
            ->where('name','=',$name)
            ->get();
        return $film;
    }

}
