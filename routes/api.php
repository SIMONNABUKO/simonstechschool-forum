<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


// | POST      | api/questions                  | questions.store                 | App\Http\Controllers\QuestionController@store 
// | GET|HEAD  | api/questions                  | questions.index                 | App\Http\Controllers\QuestionController@index 
// | DELETE    | api/questions/{question}       | questions.destroy               | App\Http\Controllers\QuestionController@destroy
// | PUT|PATCH | api/questions/{question}       | questions.update                | App\Http\Controllers\QuestionController@update  
// | GET|HEAD  | api/questions/{question}       | questions.show                  | App\Http\Controllers\QuestionController@show  

Route::apiResource('questions', 'App\Http\Controllers\QuestionController');