<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::group(['middleware' => ['web', 'auth']], function () {

    Route::get('/account', [
        'as' => 'account.index',
        'uses' => 'Account\AccountController@index'
    ]);

});
Route::group(['middleware' => ['auth']], function () {

    Route::post('/generate', [
        'as' => 'account.generate',
        'uses' => 'Account\AccountController@generate'
    ]);

    Route::post('/check', [
        'as' => 'account.check',
        'uses' => 'Account\AccountController@check'
    ]);
});
Route::get('/home', 'HomeController@index');
