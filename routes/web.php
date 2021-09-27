<?php

use Illuminate\Support\Facades\Route;

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

// ADMIN
Route::prefix('/admin')->group(function(){

    Route::get('', 'AdminController@index');
    Route::get('/add-new-user', 'AdminController@addUser');
    Route::post('/insert-user', 'AdminController@insertNewUser');
});