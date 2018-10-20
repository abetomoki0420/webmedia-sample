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

Route::get('/' , 'MediaController@index');
Route::post('/post' , 'MediaController@post');
Route::get('/post/{id}' , 'MediaController@detail');
Route::get('/create' , 'MediaController@createPost');
Route::get('/resultPost' , 'MediaController@resultPost');
Route::get('/post/{id}/edit' , 'MediaController@editPost');
Route::post('/edit' , 'MediaController@edit');
Route::get('/resultEdit' , 'MediaController@resultEdit');
Route::get('/post/{id}/delete' , 'MediaController@deletePost');
Route::get('/resultDelete' , 'MediaController@resultDelete');



Route::get('/logout' , 'UserController@logout');



Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
