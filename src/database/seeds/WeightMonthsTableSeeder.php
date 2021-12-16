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

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // テーブルのクリア
        DB::table('weight_months')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        // 初期データ用意（列名をキーとする連想配列）
        $weight_months=[
            ['client_id'=> 1,
            'year_month_date'=>'2021-11',
            'weight'=> 35.3],
            ['client_id'=> 2,
            'year_month_date'=> '2021-12',
            'weight'=> 50.0]
            ];

        foreach($weight_months as $weight_month) {
            \App\Models\WeightMonth::create($weight_month);

        }
    }
}
