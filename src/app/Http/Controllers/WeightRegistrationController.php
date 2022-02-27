<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Modelからデータを取ってくるのに今後必要になると思う
use App\Models\PersonalInfo;
use App\Models\WeightMonth;

//バリデーションを使うため
use App\Http\Requests\StoreWeightRegistration;
use App\Http\Requests\UpdateWeightRegistration;
use App\Http\Requests\AdditionWeightRegistration;

//DBのファザード(クエリビルダ)が使えるようになる
use DB;
use Illuminate\support\Facades\Log;


use App\Services\CheckFormData;
use Illuminate\Support\Facades\App;
use PhpParser\Node\Stmt\TryCatch;
use Throwable;

class WeightRegistrationController extends Controller
{
    /**
     * @return
     */
    public function index()
    {
        //クエリビルダ
        $personal_infos = DB::table('personal_infos')
        ->select('id','clint_name','birth_date', 'sex')
        ->get();
        // ->paginate(20);

        return view('WeightRegistrations.index',compact('personal_infos'));
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $PersonalInfo = PersonalInfo::all();
        $WeightMonth = WeightMonth::all();

        return view('WeightRegistrations.create', compact('PersonalInfo', 'WeightMonth'));
    }

    public function post(StoreWeightRegistration $request){

        $personal_infos = new PersonalInfo();
        $weight_months = new WeightMonth();

        $personal_infos->id = $request->input('id');
        $personal_infos->clint_name = $request->input('clint_name');
        $personal_infos->birth_date = $request->input('birth_date');
        $personal_infos->sex = $request->input('sex');
        $personal_infos->height = $request->input('height');
        $weight_months->year_month_date = $request->input('year_month_date');
        $weight_months->weight = $request->input('weight');

		//セッションに書き込む
		$request->session()->put('personal_infos', $personal_infos);
		$request->session()->put('weight_months', $weight_months);


		return redirect()->action('WeightRegistrationController@confirm');
	}

    /**
     *新規登録の入力内容の確認画面の処理
     */
    public function confirm(Request $request){
		//セッションから値を取り出す
		$personal_infos = $request->session()->get('personal_infos');
		$weight_months = $request->session()->get('weight_months');

        //セッションを空にする
		$request->session()->forget('personal_infos');
		$request->session()->forget('weight_months');

		//セッションに値が無い時はフォームに戻る
		// if(!$input){
		// 	return redirect()->action('WeightRegistrations@index');
		// }
		return view('WeightRegistrations.confirm', compact('personal_infos', 'weight_months'));
	}

    /**
     * 確認画面からセッションでデータを引き継いでDBにデータの保存
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //セッションから値を取り出す(リクエストの値を取得する形に変更)
        // $personal_infos = $request->session()->get('personal_infos');
        // $weight_months = $request->session()->get('weight_months');

        //戻るボタンが押下されたときの処理
        if($request->get('back')){
            return redirect()->action('WeightRegistrationController@create')->withInput();
        }else{

        try{
            DB::transaction(function () use($request) {
                $personal_info = PersonalInfo::create([
                    'clint_name' => $request->clint_name,
                    'birth_date' => $request->birth_date,
                    'sex' => $request->sex,
                    'height' => $request->height,
                ]);
                WeightMonth::create([
                    'client_id' => $personal_info->id,
                    'year_month_date' => $request->year_month_date,
                    'weight' => $request->weight,
                ]);
            },2);
        }catch(Throwable $e){
            //logをはいて、エラーを画面上に出す
            Log::error($e);
            throw $e;
        }


        return redirect()->action('WeightRegistrationController@index');
        }
    }

    /**
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $personal_info = PersonalInfo::find($id);
        $weight_months = WeightMonth::find($id);

        return view('WeightRegistrations.edit', compact('personal_info', 'weight_months'));
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWeightRegistration $request, $id)
    {
        //戻るボタンが押下された時の処理
        // if($request->get('back')){
        //     return redirect()->action('WeightRegistrationController@show');
        // }

        //$id を引数に取るので新しくインスタん化(new)するのではなく、すでにあるデータを持ってくる
        $personal_info = PersonalInfo::findOrFail($id);

        $personal_info->clint_name = $request->input('clint_name');
        $personal_info->birth_date = $request->input('birth_date');
        $personal_info->sex = $request->input('sex');
        $personal_info->height = $request->input('height');

        $personal_info->save();

        return redirect()->action('WeightRegistrationController@index');
        // }
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $input = PersonalInfo::find($id);

        $input->delete();

        return redirect()->action('WeightRegistrationController@index');
    }

    /**
     * 今月の体重登録処理のフォーム画面を表示
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function WeightCreate($id)
    {
        $personal_info = PersonalInfo::find($id);
        $weight_months = WeightMonth::find($id);

        return view('WeightRegistrations.addition', compact('personal_info', 'weight_months'));
    }
    /**
     * ユーザー毎で今月の体重を追加する処理
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addition(AdditionWeightRegistration $request)
    {

        WeightMonth::create([
            'client_id' => $request->id,
            'year_month_date' => $request->year_month_date,
            'weight' => $request->weight,
        ]);

        return redirect()->action('WeightRegistrationController@index');
    }

    /**
     * X年Y月の最大を計算する関数
     *
     * 自作関数
     */
    function getWeightLogData($date_key){
        //変数の初期化
        $max = 0;
        //データを条件付きで取得
            //第一引数にカラム名、第二引数に比較演算子、第三引数に比較する値を指定します。(第2引数までのときは 「=」 となる)
        $logs = WeightMonth::where("client_id",$date_key)->get();

        //データの数だけ回す
        foreach($logs as $log){
            $weight = $log->weight;
            $max = max($max, $weight);
        }

        return [
            $max,
        ];
    }

    function graph($id){
        //リクエストされたclient_idと同じものを探して weightカラムを摘出する
        $weight_log = WeightMonth::where("client_id",$id)->pluck('weight');
        $label = WeightMonth::where("client_id",$id)->pluck('year_month_date');
        return view("WeightRegistrations.weight_graph",[
            "label" => $label,
            "weight_log" => $weight_log,
        ]);
    }

}
