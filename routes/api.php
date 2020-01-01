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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('users/register','UsersController@register')->name('users.register');
Route::post('users/login','UsersController@login')->name('users.login');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('admins/register','AdminsController@register')->name('admins.register');
Route::post('admins/login','AdminsController@login')->name('admins.login');

//Route::middleware('auth:admin')->group(function(){
//    Route::get('admins/{admin?}','AdminsController@show')->name('admins.show');
//});

Route::group(['middleware' => ['api', 'multiauth:admin']], function () {
    Route::get('admins/{admin?}','AdminsController@show')->name('admins.show');
});
