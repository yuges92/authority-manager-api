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




Route::post('/authorities/api/', 'AuthorityApiController@store')->name('authorityAPI.store');
Route::resource('/authorities','AuthorityController');
Route::resource('/packages','PackageController');
Route::resource('/topics','TopicController');
Route::resource('/users','UserController');
Route::put('/profile/updatePassword','ProfileController@updatePassword')->name('updatePassword');
Route::resource('/profile','ProfileController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

// Route::group([]
//
//
// );
