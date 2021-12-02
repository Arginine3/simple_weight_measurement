<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Modelからデータを取ってくるのに今後必要になると思う
use App\Models\WeightRegistration;

//DBのファザード(クエリビルダ)が使えるようになる
use Illuminate\support\Facades\DB;

use App\Services\CheckFormData;

class WeightRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //クエリビルダ
        $WeightRegistrations = DB::table('weight_registrations')
        ->select('id','clint_name', 'measurement_date')
        ->get();
        //dd($WeightRegistrations);

        return view('WeightRegistrations.index',compact('WeightRegistrations'));
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

    public function post(Request $request){

        $input = new WeightRegistration;

        $input->clint_name = $request->input('clint_name');
        $input->birth_date = $request->input('birth_date');
        $input->sex = $request->input('sex');
        $input->height = $request->input('height');
        $input->weight = $request->input('weight');
        $input->measurement_date = $request->input('measurement_date');

		//セッションに書き込む
		$request->session()->put('form_input', $input);
        //dd($input);

		return redirect()->action('WeightRegistrationController@confirm');
	}

    public function confirm(Request $request){
		//セッションから値を取り出す
		$input = $request->session()->get('form_input');

		//セッションに値が無い時はフォームに戻る
		// if(!$input){
		// 	return redirect()->action('WeightRegistrations@index');
		// }
		return view('WeightRegistrations.confirm', ['input' => $input]);
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //セッションから値を取り出す
        $input = $request->session()->get('form_input');

        //セッションを空にする
		$request->session()->forget('form_input');

        if($request->get('back')){
            return redirect()->action('WeightRegistrationController@create')->withInput();
        }else{
        //データを保存してindex.blade.phpにリダイレクト
        $input->save();
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
        $WeightRegistration = WeightRegistration::find($id);

        $sex = CheckFormData::checkSex($WeightRegistration);

        return view('WeightRegistrations.show', compact('WeightRegistration', 'sex'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $WeightRegistration = WeightRegistration::find($id);

        return view('WeightRegistrations.edit', compact('WeightRegistration') );
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
        $input = WeightRegistration::find($id);

        $input->clint_name = $request->input('clint_name');
        $input->birth_date = $request->input('birth_date');
        $input->sex = $request->input('sex');
        $input->height = $request->input('height');
        $input->weight = $request->input('weight');
        $input->measurement_date = $request->input('measurement_date');

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
        //
        $input = WeightRegistration::find($id);
        $input->delete();

        return redirect()->action('WeightRegistrationController@index');
    }
}
