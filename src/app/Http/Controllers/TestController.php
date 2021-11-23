<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

#Modelの読み込み
use App\Models\Test;

#Facadesの読み込み
use Illuminate\Support\Facades\DB;


class TestController extends Controller
{
    //
    public function index()
    {
        $values = Test::all();

        $tests = DB::table('tests')
        ->select('id')
        ->get();
        
        dd($tests);

        return view('tests.test', compact('values'));
    }
}
