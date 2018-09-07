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

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('meal', 'MealsController');

// Route::get('/meal','MealsController@index');
// Route::get('/meal/create','MealsController@create');
// Route::post('/meal/store','MealsController@store');
// Route::post('/meal/destroy/{id}','MealsController@destroy');