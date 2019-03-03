<?php

namespace App\Http\Controllers;

use App\Films;
use App\Posts;
use App\User;
use DummyFullModelClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function editGet(){

        $currentUser = Auth::user();
        return view('editUser', compact('currentUser'));
    }

    public function editUserPost(Request $request){

        User::edit($request, Auth::id());
        return redirect('/editProfile');
    }

    public function allUsers(){
        $users = User::takeAll(Auth::id());
        return view('allUsers',compact('users'));
    }

    public function currentUser($id){
        $user = User::find($id);
        $film = new Films();
        $films = $film->current($id);
        $posts = Posts::userPosts($id);
        return view('curUser',compact('user', 'films','posts'));
    }

    public function addPost(Request $request){
        Posts::store($request);
        return redirect('/allUsers');
    }
}
