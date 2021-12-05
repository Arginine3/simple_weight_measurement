<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Modelからデータを取ってくるのに今後必要になると思う
use App\Models\PersonalInfo;
use App\Models\WeightMonth;

//DBのファザード(クエリビルダ)が使えるようになる
use Illuminate\support\Facades\DB;

use App\Services\CheckFormData;

class WeightRegistrationController extends Controller
{
    /**
     * 必要なデータを取得して index.blade.phpを表示
     *
     * @return
     */
    public function index()
    {
        //クエリビルダ
        $personal_infos = DB::table('personal_infos')
        ->select('id','clint_name', 'sex')
        ->get();
        //dd($personal_infos);

        return view('WeightRegistrations.index',compact('personal_infos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('WeightRegistrations.create');
    }

    /**
     *
     *
     *
     */
    public function post(Request $request){

        $personal_infos = new PersonalInfo;
        $weight_months = new WeightMonth;

        $personal_infos->clint_name = $request->input('clint_name');
        $personal_infos->birth_date = $request->input('birth_date');
        $personal_infos->sex = $request->input('sex');
        $personal_infos->height = $request->input('height');
        $weight_months->client_id = $request->input('client_id');
        $weight_months->year_month_date = $request->input('year_month_date');
        $weight_months->year_month_date = $request->input('year_month_date');
        $weight_months->weight = $request->input('weight');

		//セッションに書き込む
		$request->session()->put('personal_infos', $personal_infos);
		$request->session()->put('weight_months', $weight_months);


		return redirect()->action('WeightRegistrationController@confirm');
	}

    /**
     *新規登録の入力内容の確認画面の処理
     *
     *
     */
    public function confirm(Request $request){
		//セッションから値を取り出す
		$personal_infos = $request->session()->get('personal_infos');
		$weight_months = $request->session()->get('weight_months');
        //dd($weight_months);
		//セッションに値が無い時はフォームに戻る
		// if(!$input){
		// 	return redirect()->action('WeightRegistrations@index');
		// }
		return view('WeightRegistrations.confirm', ['personal_infos' => $personal_infos, 'weight_months' => $weight_months], );
	}

    /**
     * 確認画面からセッションでデータを引き継いでDBにデータの保存
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //セッションから値を取り出す
        $personal_infos = $request->session()->get('personal_infos');
        $weight_months = $request->session()->get('weight_months');

        //変数の中身を確認
        //dd($personal_infos, $weight_months);
        dd($personal_infos, $weight_months);

        //セッションを空にする
		$request->session()->forget('personal_infos');
		$request->session()->forget('weight_months');


        //戻るボタンが押下されたときの処理
        if($request->get('back')){
            return redirect()->action('WeightRegistrationController@create')->withInput();
        }else{
        //データを保存してindex.blade.phpにリダイレクト
        $personal_infos->save();
        $weight_months->save();


        return redirect()->action('WeightRegistrationController@index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $personal_info = PersonalInfo::find($id);
        $weight_months = WeightMonth::find($id);

        $sex = CheckFormData::checkSex($personal_info);

        return view('WeightRegistrations.show', compact('personal_info', 'weight_months', 'sex'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $personal_info = PersonalInfo::find($id);

        return view('WeightRegistrations.edit', compact('personal_info') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //$id を引数に取るので新しくインスタん化(new)するのではなく、すでにあるデータを持ってくる
        $input = new PersonalInfo;
        $input = new WeightMonth;

        $input->clint_name = $request->input('clint_name');
        $input->birth_date = $request->input('birth_date');
        $input->sex = $request->input('sex');
        $input->height = $request->input('height');
        $input->year_month_date = $request->input('year_month_date');
        $input->weight = $request->input('weight');

        $input->save();

        return redirect()->action('WeightRegistrationController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //考える余地あり(2つあると上書きされて削除できない)
        $input = PersonalInfo::find($id);
        //$input = WeightMonth::find($id);

        $input->delete();

        return redirect()->action('WeightRegistrationController@index');
    }
}
