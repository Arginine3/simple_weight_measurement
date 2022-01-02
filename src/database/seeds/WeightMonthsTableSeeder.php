<?php

use Illuminate\Database\Seeder;

class WeightMonthsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // テーブルのクリア
        DB::table('weight_months')->truncate();

        //DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        // 初期データ用意（列名をキーとする連想配列）
        $weight_months=[
            ['client_id'=> 1,
            'year_month_date'=>'2021-1',
            'weight'=> 60.2],
            ['client_id'=> 1,
            'year_month_date'=> '2021-2',
            'weight'=> 60.4],
            ['client_id'=> 1,
            'year_month_date'=> '2021-3',
            'weight'=> 60.8],
            ['client_id'=> 1,
            'year_month_date'=> '2021-4',
            'weight'=> 61.2],
            ['client_id'=> 1,
            'year_month_date'=> '2021-5',
            'weight'=> 60.8],
            ['client_id'=> 1,
            'year_month_date'=> '2021-6',
            'weight'=> 60.6],
            ['client_id'=> 1,
            'year_month_date'=> '2021-7',
            'weight'=> 60.7],
            ['client_id'=> 1,
            'year_month_date'=> '2021-8',
            'weight'=> 61],
            ['client_id'=> 1,
            'year_month_date'=> '2021-9',
            'weight'=> 61.6],
            ['client_id'=> 1,
            'year_month_date'=> '2021-10',
            'weight'=> 61.3],
            ['client_id'=> 1,
            'year_month_date'=> '2021-11',
            'weight'=> 60.8],
            ['client_id'=> 1,
            'year_month_date'=> '2021-12',
            'weight'=> 60.4]
            ];

        foreach($weight_months as $weight_month) {
            \App\Models\WeightMonth::create($weight_month);

        }
    }
}
