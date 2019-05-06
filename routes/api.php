<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
 * 
 */

Route::get('/ussd/', 'SessionController@index');

Route::post('/ussd', 'SessionController@store')->name('session.store');

Route::get('/ussd/{task}', 'SessionController@show')->name('session.show');

Route::put('/ussd/{task}', 'SessionController@update')->name('session..update');

Route::delete('/ussd/{task}', 'SessionController@destory')->name('session.destroy');
