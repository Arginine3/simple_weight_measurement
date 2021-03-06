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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'WeightRegistrations', 'middleware' => 'auth'],function(){
    Route::get('index', 'WeightRegistrationController@index')->name('WeightRegistrations.index');
    Route::get('create', 'WeightRegistrationController@create')->name('WeightRegistrations.create');
    Route::post('post', 'WeightRegistrationController@post')->name('WeightRegistrations.post');
    Route::get('confirm', 'WeightRegistrationController@confirm')->name('WeightRegistrations.confirm');
    Route::post('store', 'WeightRegistrationController@store')->name('WeightRegistrations.store');
    Route::get('show/{id}', 'WeightRegistrationController@show')->name('WeightRegistrations.show');
    Route::get('edit/{id}', 'WeightRegistrationController@edit')->name('WeightRegistrations.edit');
    Route::post('update/{id}', 'WeightRegistrationController@update')->name('WeightRegistrations.update');
    Route::post('destroy/{id}', 'WeightRegistrationController@destroy')->name('WeightRegistrations.destroy');
    Route::get('WeightCreate/{id}', 'WeightRegistrationController@WeightCreate')->name('WeightRegistrations.WeightCreate');
    Route::post('addition/{id}', 'WeightRegistrationController@addition')->name('WeightRegistrations.addition');
    Route::get('graph/{id}', 'WeightRegistrationController@graph')->name('WeightRegistrations.graph');
});


