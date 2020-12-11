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

Route::apiResource('questions', 'App\Http\Controllers\QuestionController');
// | POST      | api/questions                  | questions.store                 | App\Http\Controllers\QuestionController@store 
// | GET|HEAD  | api/questions                  | questions.index                 | App\Http\Controllers\QuestionController@index 
// | DELETE    | api/questions/{question}       | questions.destroy               | App\Http\Controllers\QuestionController@destroy
// | PUT|PATCH | api/questions/{question}       | questions.update                | App\Http\Controllers\QuestionController@update  
// | GET|HEAD  | api/questions/{question}       | questions.show                  | App\Http\Controllers\QuestionController@show  



Route::apiResource('categories', 'App\Http\Controllers\CategoryController');
// | POST      | api/categories                 | categories.store                | App\Http\Controllers\CategoryController@store                                   | api              |
// |        | GET|HEAD  | api/categories                 | categories.index                | App\Http\Controllers\CategoryController@index                                   | api              |
// |        | DELETE    | api/categories/{category}      | categories.destroy              | App\Http\Controllers\CategoryController@destroy                                 | api              |
// |        | PUT|PATCH | api/categories/{category}      | categories.update               | App\Http\Controllers\CategoryController@update                                  | api              |
// |        | GET|HEAD  | api/categories/{category}      | categories.show                 | App\Http\Controllers\CategoryController@show  



Route::apiResource('/questions/{question}/replies', 'App\Http\Controllers\ReplyController');
// |POST|        api/questions/{question}/replies         | replies.store                   | App\Http\Controllers\ReplyController@store                                      | api              |
// | GET|HEAD  | api/questions/{question}/replies         | replies.index                   | App\Http\Controllers\ReplyController@index                                      | api              |
// | GET|HEAD  | api/questions/{question}/replies/{reply} | replies.show                    | App\Http\Controllers\ReplyController@show                                       | api              |
// | PUT|PATCH | api/questions/{question}/replies/{reply} | replies.update                  | App\Http\Controllers\ReplyController@update                                     | api              |
// | DELETE    | api/questions/{question}/replies/{reply} | replies.destroy                 | App\Http\Controllers\ReplyController@destroy 

Route::post('/like/{reply}', 'App\Http\Controllers\LikeController@like');
Route::delete('/like/{reply}', 'App\Http\Controllers\LikeController@unlike');

Route::group([

    'prefix' => 'auth'

], function () {

    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('signup', 'App\Http\Controllers\AuthController@signup');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::post('me', 'App\Http\Controllers\AuthController@me');

});