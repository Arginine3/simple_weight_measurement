<?php

use Illuminate\Database\Seeder;

class WeightRegistrationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // テーブルのクリア
        DB::table('weight_registrations')->truncate();

        // 初期データ用意（列名をキーとする連想配列）
        $weights=[
        ['clint_name'=>'吉永真大',
        'birth_date'=> '2021-11-22',
        'sex'=> 0,
        'height'=> 134.0,
        'weight'=>35.0,
        'measurement_date'=>'2021-11'],
        ['clint_name'=>'吉永零也',
        'birth_date'=> '2021-11-23',
        'sex'=> 1,
        'height'=> 175.0,
        'weight'=>69.2,
        'measurement_date'=>'2021-11']
        ];

        foreach($weights as $weight) {
            \App\Models\WeightRegistration::create($weight);
        }
    }
}
