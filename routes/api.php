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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/getBlogs', 'Web\WebController@getBlogs');
Route::get('/getEncryptedId/{id}', 'Web\WebController@encrptJsVariable');
Route::get('/getTags', 'Web\WebController@getTags');
Route::get('/individualTagDataBlogs/{id}', 'Web\WebController@individualTagDataBlogs');
