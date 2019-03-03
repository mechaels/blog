<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Posts extends Model
{
    protected $fillable = [
        'text',
        'users_id'
    ];

    public static function userPosts($id){
        $posts = DB::table('posts')
            ->where('users_id', '=', $id)
            ->get();

        return $posts;
    }

    public static function store(Request $request)
    {
            Posts::create([
                'text' => $request->text,
                'users_id' => $request->id
            ]);

        return redirect('/home');

    }
}
