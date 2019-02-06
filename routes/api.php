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
$apiDomain= env("API_DOMAIN", "apidev-asksara.dlf.org.uk");
$editorDomain= env("EDITOR_DOMAIN", "saraeditor-dev2.dlf.org.uk");

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::group(['domain' => 'api-asksara'], function(){
  Route::get('/login', 'Api\AuthController@index');


});
