<?php

namespace App\Services;

class CheckFormData
{
  public static function checkSex($data){

    if($data->sex === 0){
      $sex = '男性';
      }
    if($data->sex === 1){
      $sex = '女性';
      }

      return $sex;
  }

}