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

Route::get('/', 'MainController@home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('app' , function (){
    return view('layouts.app');
});

Route::get('/links',[
    'as' => 'links',
    'uses' => 'LinkController@index',
    'middleware' => 'auth'
]);
Route::get('/links/delete/{id}',[
    'as' => 'delete',
    'uses' => 'LinkController@delete',
    'middleware' => 'auth'

]);
Route::get('/links/edit',[
    'as' => 'edit',
    'uses' => 'LinkController@edit',
    'middleware' => 'auth'

]);

Route::post('/link/check{id}',[
    'as' => 'checkEdit',
    'uses' => 'LinkController@checkEdit',
    'middleware' => 'auth'

]);

Route::get('/create' ,[
    'as' => 'create',
    'uses' => 'LinkController@create',
    'middleware' => 'auth'
]);

Route::post('/create' ,[
    'as' => 'create',
    'uses' => 'LinkController@checkCreate',
    'middleware' => 'auth'
]);

Route::get('/changeCondition{id}' ,[
    'as' => 'changeCondition',
    'uses' => 'LinkController@changeCondition',
    'middleware' => 'auth'
]);

Route::get('/links{slug}','LinkController@show')->name('me');

