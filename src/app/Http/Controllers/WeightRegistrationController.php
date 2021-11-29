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

    public function confirm(Request $request){
		//セッションから値を取り出す
		//$input = $request->session()->get("form_input");

		//セッションに値が無い時はフォームに戻る
		// if(!$input){
		// 	return redirect()->action("WeightRegistrations@index");
		// }
		return view("WeightRegistrations.confirm");
	}

    // public function send(Request $request){
	// 	//セッションから値を取り出す
	// 	$input = $request->session()->get("form_input");

	// 	//セッションに値が無い時はフォームに戻る
	// 	if(!$input){
	// 		return redirect()->action("SampleFormController@show");
	// 	}

	// 	//ここでメールを送信するなどを行う

	// 	//セッションを空にする
	// 	$request->session()->forget("form_input");

	// 	return redirect()->action("WeightRegistrations@index");
	// }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $your_name = $request->input('clint_name');
        $age = $request->input('birth_date');
        $gender = $request->input('sex');
        $weight = $request->input('height');
        $height = $request->input('weight');
        $measurement_date = $request->input('measurement_date');

        //dd($your_name, $age, $gender, $weight, $height, $measurement_date);

        //データを保持して確認画面(confirm.php)に画面遷移させる

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
