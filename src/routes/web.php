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
    Route::post('store', 'Weight RegistrationController@store')->name('WeightRegistrations.store');
    Route::get('show/{id}', 'Weight RegistrationController@show')->name('WeightRegistrations.show');
    Route::get('edit/{id}', 'Weight RegistrationController@edit')->name('WeightRegistrations.edit');
    Route::post('update/{id}', 'Weight RegistrationController@update')->name('WeightRegistrations.update');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
