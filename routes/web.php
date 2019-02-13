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


$apiDomain= config('sara.saraApiDomain');
$editorDomain= config('sara.saraEditorDomain');



//grouped route list for sara editor
Route::group(['domain' => $editorDomain], function(){

  Route::get('/login', 'Auth\LoginController@login');
  Auth::routes();

  Route::group(['middleware' => ['auth']], function(){
    Route::get('/packages/{package}/MainTopics/{mainTopic}/customSubTopics', 'PackageController@getCustomSubTopics')->name('getCustomSubTopics');
    Route::post('/packages/{package}/MainTopics/{mainTopic}/customSubTopics', 'PackageController@updateCustomSubTopics')->name('updateCustomSubTopics');
    Route::delete('/packages/{package}/removeCustomMainTopic', 'PackageController@removeCustomMainTopic')->name('removeCustomMainTopic');
    Route::post('/packages/{package}/MainTopics/{mainTopic}/addNewCustomTopics', 'PackageController@addNewCustomTopics')->name('addNewCustomTopics');

    // Route::post('/authorities/authorityAPI/', 'AuthorityApiController@store')->name('authorityAPI.store');
    // Route::put('/authorities/{authorityApi}/api/', 'AuthorityApiController@update')->name('authorityAPI.update');
    Route::resource('/authorityApi','AuthorityApiController');
    Route::resource('/authorities','AuthorityController');
    Route::resource('/authorities/{authority}/packages/authorityPackage','AuthorityPackageController');
    Route::post('/packages/{package}/mainTopic/','PackageController@addMainTopic')->name('packages.addMainTopic');
    Route::delete('/packages/{package}/mainTopic','PackageController@removeMainTopic')->name('packages.removeMainTopic');
    Route::resource('/packages','PackageController');
    Route::resource('/mainTopics','MainTopicController');
    Route::post('/mainTopics/{mainTopic}/subTopic/','MainTopicController@addSubtopic')->name('mainTopics.addSubtopics');
    Route::delete('/mainTopics/{mainTopic}/subTopic/','MainTopicController@removeSubtopic')->name('mainTopics.removeSubtopic');
    Route::resource('/users','UserController');
    Route::put('/profile/updatePassword','ProfileController@updatePassword')->name('updatePassword');
    Route::resource('/profile','ProfileController');


    Route::get('/home', 'HomeController@index');
    Route::get('/', 'HomeController@index');
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');


  });


});



Route::group(['domain' => $apiDomain], function(){
  Route::get('/login', function (){
dd('Hello World');
});

});
