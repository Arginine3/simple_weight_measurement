<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::get('tests/test', 'TestController@index');

//最終的にこの書き方にしたい(resource)
// Route::resource('WeightRegistrations','WeightRegistrationController');

// Route::group(['prefix' => 'WeightRegistrations'],function(){
//     Route::get('confirm', 'WeightRegistrationController@confirm')->name('WeightRegistrations.confirm');
//     Route::post('send', 'WeightRegistrationController@send')->name('WeightRegistrations.send');
// });

// 認証をはさみたいときは、['prefix' => 'WeightRegistrations', 'middleware' => 'auth']
Route::group(['prefix' => 'WeightRegistrations'],function(){
    Route::get('index', 'WeightRegistrationController@index')->name('WeightRegistrations.index');
    Route::get('create', 'WeightRegistrationController@create')->name('WeightRegistrations.create');
    Route::get('confirm', 'WeightRegistrationController@confirm')->name('WeightRegistrations.confirm');
    Route::post('store', 'WeightRegistrationController@store')->name('WeightRegistrations.store');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
