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
|dsd
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::Resource('/category','CategoryController');
Route::put('/category','CategoryController@store');
Route::Resource('/author', 'AuthorController');
Route::put('/author', 'AuthorController@store');
Route::Resource('/story','StoryController');
//Route::post('/login', 'UserController@login');
Route::post('/register', 'RegisterController@registerAccount');
Route::post('/update','ChapterContoller@addChapter');
