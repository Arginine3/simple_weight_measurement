<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeightMonth extends Model
{
    /**
    * 複数代入する属性
    *
    * @var array
    */
    protected $fillable = [
        'client_id',
        'year_month_date',
        'weight'
    ];
    
    //「１対多」の「多」側 → メソッド名は複数形
    public function PersonalInfo()
    {
        //リレーションの設定
        return $this->belongsTo('App\Models\PersonalInfo', 'client_id');
    }
}
