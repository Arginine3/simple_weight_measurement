<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

//use でWeightMonthModelを読み込む必要があるかも

class PersonalInfo extends Model
{
    /**
    * 複数代入する属性
    *
    * @var array
    */
    protected $fillable = [
        'clint_name',
        'birth_date',
        'sex',
        'height'
    ];

    //「１対多」の「多」側 → メソッド名は複数形
    public function WeightMonths()
    {
        //リレーションの設定
        return $this->hasMany('App\Models\WeightMonth', 'client_id', 'id');
    }
}
