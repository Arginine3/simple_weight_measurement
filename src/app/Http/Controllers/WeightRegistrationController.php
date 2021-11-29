<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Modelからデータを取ってくるのに今後必要になると思う
use App\Models\WeightRegistration;

class WeightRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('WeightRegistrations.index');
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

    public function send(Request $request){
		//セッションから値を取り出す
		$input = $request->session()->get('form_input');

		//セッションに値が無い時はフォームに戻る
		// if(!$input){
		// 	return redirect()->action('SampleFormController@show');
		// }

		//セッションを空にする
		$request->session()->forget('form_input');

		return redirect()->action('WeightRegistrations@index');
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

        //データを保持して確認画面(confirm.php)に画面遷移させる
        $input->save();
        return redirect()->action('WeightRegistrationController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$Individual = Model名::find($id)

        return view('WeightRegistrations.show', compact('Individual'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$Individual = Model名::find($id)

        return view('WeightRegistrations.edit', compact('Individual'));
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
        //

        return redirect('WeightRegistrations.index');
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
    }
}
