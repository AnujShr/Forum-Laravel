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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::resource('threads','ThreadController');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/threads', 'ThreadController@index');
Route::post('/threads', 'ThreadController@store');
Route::get('/threads/create', 'ThreadController@create');

Route::get('/threads/{channel}/{thread}', 'ThreadController@show');

Route::delete('/threads/{channel}/{thread}', 'ThreadController@destroy');
Route::get('/threads/{channel}/{thread}/replies', 'ReplyController@index');
Route::post('/threads/{channel}/{thread}/replies', 'ReplyController@store');

Route::get('/threads/{channel}', 'ThreadController@index');

Route::post('/threads/{channel}/{thread}/subscription', 'ThreadSubscriptionsController@store')->middleware('auth');

Route::delete('/replies/{reply}', 'ReplyController@destroy');
Route::patch('/replies/{reply}', 'ReplyController@update');

Route::post('/replies/{reply}/favourite', 'FavouriteController@store');
Route::delete('/replies/{reply}/favourite', 'FavouriteController@destroy');

Route::get('/profiles/{user}', 'ProfileController@show')->name('profile');
