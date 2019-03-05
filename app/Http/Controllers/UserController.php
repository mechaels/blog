<?php

namespace App\Http\Controllers;

use App\Films;
use App\Posts;
use App\Rating;
use App\User;
use DummyFullModelClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function editGet(){
        //Получить информацию о текущем пользователе
        $currentUser = Auth::user();
        return view('editUser', compact('currentUser'));
    }

    //Редактируем имя и номер телефона
    public function editUserPost(Request $request){
        //Обновить информацию о пользователе
        User::edit($request, Auth::id());
        return redirect('/editProfile');
    }

    //Все пользователи
    public function allUsers(){
        //Получить всех пользователей
        $users = User::takeAll(Auth::id());
        return view('allUsers',compact('users'));
    }

    //Выводим информацию о выбранном пользователе
    public function currentUser($id){
        //Находим пользователя
        $user = User::find($id);
        $film = new Films();
        //Находим его фильмы
        $films = $film->current($id);
        //Находим его комментарии
        $posts = Posts::userPosts($id);
        //Считаем его рейтинг
        $avgRate = round(Rating::averageRate($id),2);
        //Смотрим есть ли рейтинг
        $rating = Rating::find(Auth::id(), $id);
        return view('curUser',compact('user', 'films','posts','rating','avgRate'));
    }

    //Добавляем комменатарий
    public function addPost(Request $request){
        //Добавить комментарий
        Posts::store($request);

        return redirect()->action(
            'UserController@currentUser', ['id' => $request->id]
        );
    }

    //Добавляем рейтинг
    public function addRate(Request $request){
        //Добавить оценку
        Rating::store($request, Auth::id(), $request->id);

        return redirect()->action(
            'UserController@currentUser', ['id' => $request->id]
        );
    }
}
