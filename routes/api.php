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
$apiDomain= config('sara.saraApiDomain');
$editorDomain= config('sara.saraEditorDomain');

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//   return response()->json(['data' => $request], 200);
//
// });



Route::group(['domain' => $apiDomain], function(){
  Route::get('/test', function ()
  {
    return response()->json('Hello World', 200);

    });

  Route::post('/login', 'Api\AuthController@login');
  // Route::get('/user', 'Api\AuthController@index');
  Route::group(['middleware' => 'auth:api'], function(){
    // Route::get('/v1/user', 'Api\AuthController@index');
    Route::get('/v1/packages', 'Api\PackageController@index');
    Route::get('/v1/packages/{package}', 'Api\PackageController@show');
    Route::get('/v1/mainTopics', 'Api\MainTopicController@index');
    Route::get('/v1/mainTopics/{mainTopic}', 'Api\MainTopicController@show');
    Route::get('/v1/subTopics/{subTopic}', 'Api\MainTopicController@index');
    Route::get('/v1/mainTopics', 'Api\MainTopicController@index');
  });


});
