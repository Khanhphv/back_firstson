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

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

//use Illuminate\Database\Migrations\Migration;

Route::group(['prefix' => '/author'], function () {
    Route::post("", 'AuthorController@createAuthor');
    Route::get("", "AuthorController@getAll");
});
//Route::group(['prefix' => '/category'], function () {
//    Route::post("", "CategoryController@store");
//    Route::get("", "CategoryController@index");
//    Route::get("/{id}","CategoryController@show");
//    Route::put("", "CategoryController@store");
//    Route::delete("", "CategoryController@destroy");
//
//});
Route::group(['prefix' => '/story'], function () {
    Route::get('', 'StoryController@getListAllStory');
    Route::post('', 'StoryController@addStory');
});


