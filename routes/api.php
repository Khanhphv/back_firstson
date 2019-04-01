<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider withi   n a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//Route::group(['prefix' => '/category'], function () {
//    Route::post("", "CategoryController@store");
//    Route::get("", "CategoryController@index");
//    Route::get("/{id}","CategoryController@show");
//    Route::put("", "CategoryController@store");
//    Route::delete("", "CategoryController@destroy");
//
//});
Route::Resource('/category','CategoryController');
Route::put('/category','CategoryController@store');
// Route::delete('/category','CategoryController@destroy');
