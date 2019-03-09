<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Country extends Model
{
    protected $fillable = [
        'name'
    ];

    public function films(){
        return $this->hasMany('App\Films');
    }

    //Проверка таблицы на пустоту
    public static function emp(){
        $countries = DB::table('countries')
            ->get();

        if($countries->count() > 0){
            return false;
        }
        else return true;
    }

    public static function getAll(){
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api.vk.com/method/database.getCountries');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,'need_all=1&count=1000&access_token=7f1a3bd87f1a3bd87f1a3bd8467f732f3277f1a7f1a3bd82364367536ab3a0426f66ab9&v=5.92');

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        if(!$result){
            $result = curl_error($ch);
        }
        curl_close($ch);

        return json_decode($result);
    }

    //Получаем страны из vk.api
    public static function getAll1()
    {
        $countries = curl_init();

        curl_setopt($countries, CURLOPT_URL, 'https://api.vk.com/method/database.getCountries');
        curl_setopt($countries, CURLOPT_POST, true);
        curl_setopt($countries, CURLOPT_POSTFIELDS, 'need_all=1&count=1000&access_token=7f1a3bd87f1a3bd87f1a3bd8467f732f3277f1a7f1a3bd82364367536ab3a0426f66ab9&v=5.92');
        curl_setopt($countries, CURLOPT_RETURNTRANSFER, true);

        $countries_res = json_decode(curl_exec($countries));

        curl_close($countries);

        return $countries_res;
    }

    //Добавляем страны в базу
    public static function add($countries)
    {
        foreach ($countries->response->items as $c){
            DB::table('countries')->insert(
                ['name' => $c->title,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]
            );
        }
        return 0;

    }


}
