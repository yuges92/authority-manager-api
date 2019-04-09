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
  Route::group(['middleware' => ['auth:api', 'apiAccess']], function(){
    Route::get('/v1/packages', 'Api\PackageController@index');
    Route::get('/v1/packages/{package}', 'Api\PackageController@show');
    Route::get('/v1/mainTopics', 'Api\MainTopicController@index');
    Route::get('/v1/mainTopics/{mainTopic}', 'Api\MainTopicController@show');
    Route::get('/v1/subTopics/', 'Api\SubTopicController@index');
    Route::get('/v1/subTopics/{subTopic}', 'Api\SubTopicController@show');
    Route::get('/v1/subTopics/{subTopic}/questions', 'Api\MainTopicController@index');
    Route::get('/v1/questions/{question}', 'Api\QuestionController@show');
    Route::post('/v1/questions/{question}', 'Api\QuestionController@nextQuestion');
    Route::get('/v1/reports/', 'Api\ReportController@allUsers');
    Route::get('/v1/reports/users/{user_id}', 'Api\ReportController@userReports');
    Route::get('/v1/reports/users/{user_id}/subTopics/{subTopic}', 'Api\ReportController@getReportForAUser');
  });


});
