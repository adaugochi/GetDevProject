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
    return view('login');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');
Route::post('/register/{data}', 'AuthController@create');

Route::get('/home', 'ExpenseController@getExpenses');
Route::post('/expense', 'ExpenseController@create');