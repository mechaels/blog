<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Posts extends Model
{
    protected $fillable = [
        'text',
        'ToUsers_id',
        'ByUsers_id'
    ];

    //Получаем комментарии к профилю пользователя
    public static function userPosts($id){
        $posts = DB::table('posts')
            ->selectraw('posts.text as text, users.name as name')
            ->leftJoin('users','posts.ByUsers_id','=','users.id')
            ->where('posts.ToUsers_id', '=', $id)
            ->get();

        return $posts;
    }

    //Добавляем комментарий в базу
    public static function store(Request $request, $id)
    {

        $validation = Validator::make($request->all(), ['text' => 'required']);

        if ($validation->fails())
        {
            return redirect('curUser')->withErrors($validation);
        }

            Posts::create([
                'text' => $request->text,
                'ToUsers_id' => $request->id,
                'ByUsers_id' => $id
            ]);

        return redirect('/home');

    }
}
