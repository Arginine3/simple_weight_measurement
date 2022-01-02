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
            'clint_name'=>'白石信治	',
            'birth_date'=> '1954-04-17',
            'sex'=> 0,
            'height'=> 150.2],
            ['id'=>2,
            'clint_name'=>'坂上幸二',
            'birth_date'=> '1954-07-02',
            'sex'=> 1,
            'height'=> 175.4],
            ['id'=>3,
            'clint_name'=>'細井眞幸',
            'birth_date'=> '1950-09-27',
            'sex'=> 0,
            'height'=> 153],
            ['id'=>4,
            'clint_name'=>'平井明美',
            'birth_date'=> '1951-02-20',
            'sex'=> 0,
            'height'=> 168.2],
            ['id'=>5,
            'clint_name'=>'竹下白亜	',
            'birth_date'=> '1953-09-13',
            'sex'=> 1,
            'height'=> 167.4],
            ['id'=>6,
            'clint_name'=>'立川信治	',
            'birth_date'=> '1944-10-12',
            'sex'=> 0,
            'height'=> 151.2],
            ['id'=>7,
            'clint_name'=>'石橋真由子	',
            'birth_date'=> '1944-01-02',
            'sex'=> 1,
            'height'=> 170.2],
            ['id'=>8,
            'clint_name'=>'澤田栄太郎	',
            'birth_date'=> '1955-03-03',
            'sex'=> 0,
            'height'=> 155.9],
            ['id'=>9,
            'clint_name'=>'内海昌子	',
            'birth_date'=> '1954-10-14',
            'sex'=> 1,
            'height'=> 155],
            ['id'=>10,
            'clint_name'=>'三田章夫	',
            'birth_date'=> '1955-04-18',
            'sex'=> 0,
            'height'=> 150.1],
            ['id'=>11,
            'clint_name'=>'矢口伍朗	',
            'birth_date'=> '1963-07-25',
            'sex'=> 0,
            'height'=> 170.2],
            ['id'=>12,
            'clint_name'=>'河本春吉	',
            'birth_date'=> '1971-01-03',
            'sex'=> 1,
            'height'=> 151],
            ['id'=>13,
            'clint_name'=>'大熊弓子	',
            'birth_date'=> '1955-06-04',
            'sex'=> 0,
            'height'=> 167.3],
            ['id'=>14,
            'clint_name'=>'永井正勝	',
            'birth_date'=> '1962-10-20',
            'sex'=> 1,
            'height'=> 150.2],


            ];

            foreach($infos as $info) {
                \App\Models\PersonalInfo::create($info);

            }
        }
}
