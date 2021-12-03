<?php

use Illuminate\Database\Seeder;

class PersonalInfosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // テーブルのクリア
        DB::table('personal_infos')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        // 初期データ用意（列名をキーとする連想配列）
        $infos=[
            ['id'=>1,
            'clint_name'=>'吉永真大',
            'birth_date'=> '2021-11-22',
            'sex'=> 0,
            'height'=> 134.2],
            ['id'=>2,
            'clint_name'=>'吉永零也',
            'birth_date'=> '2021-11-23',
            'sex'=> 1,
            'height'=> 175.4]
            ];

            foreach($infos as $info) {
                \App\Models\PersonalInfo::create($info);

            }
        }
}
