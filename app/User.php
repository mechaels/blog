<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function films(){
        return $this->hasMany('App\Films');
    }

    //Редактируем информацию о пользователе
    public static function edit(Request $request, $id){

        DB::table('users')
            ->where('id', $id)
            ->update
            ([
                'name' => $request->name,
                'surname' => $request->surname,
                'patronymic' => $request->patronymic,
                'phone' => $request->phone
            ]);
    }

    //Ищем пользователя
    public static function find($id){
        $user = DB::table('users')->find($id);

        return $user;
    }

    //Все пользователи
    public static function takeAll($id){
        $users = DB::table('users')
                    ->where('id','!=',$id)
                    ->get();

        return $users;
    }
}
