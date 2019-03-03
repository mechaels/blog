<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Rating extends Model
{
    protected $fillable = [
        'number',
        'byUsers_id',
        'toUsers_id'
    ];

    public static function find($id, $curId){
        $rating = DB::table('rating')
            ->where([
                ['byUsers_id', '=', $id],
                ['toUsers_id', '=', $curId],
            ])
            ->get();

        return $rating;
    }

    public static function store(Request $request, $id, $curId)
    {
        DB::table('rating')->insert(
            ['number' => $request->rate,
             'byUsers_id' => $id,
             'toUsers_id' => $curId,
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            ]
        );

        return 0;

    }

    public static function averageRate($id){
        $rating = DB::table('rating')
            ->where('toUsers_id','=',$id)
            ->avg('number');

        return $rating;
    }
}
