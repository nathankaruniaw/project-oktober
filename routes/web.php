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
Route::prefix('/admin')->middleware('auth')->group(function(){

    Route::get('', 'AdminController@index');
    Route::get('/user-management', 'AdminController@userIndex');
    Route::post('/insert-user', 'AdminController@insertNewUser');
    Route::post('/change-pasword', 'AdminController@changePassword');
    Route::post('/delete-user', 'AdminController@deleteUser');

    Route::prefix('/halaman')->group(function(){
        Route::get('', 'PageController@index')->name('page');
        Route::get('/get-data', 'PageController@pageGetData')->name('pageGetData');
        Route::post('/add-data', 'PageController@pageAddData')->name('pageAddData');
        Route::get('/hapus-data/{id}', 'PageController@pageDeleteData')->name('pageDeleteData');
        Route::post('/edit-data', 'PageController@pageEditData')->name('pageEditData');
        Route::post('/update', 'PageController@pageUpdateData')->name('pageUpdateData');
        Route::post('/insert-subPage', 'PageController@pageInsertSubPage')->name('pageInsertSubPage');
        Route::post('/delete-subPage', 'PageController@pageDeleteSubPage')->name('pageDeleteSubPage');
    });

    Route::prefix('/section')->group(function(){
        Route::get('', 'SectionController@index')->name('section');
        Route::get('/add-data/{id}', 'SectionController@sectionAddData')->name('sectionAddData');
        Route::post('/get-section-data', 'SectionController@sectionGetSectionData')->name('sectionGetSectionData');
        Route::post('/update-section-data', 'SectionController@sectionUpdateSectionData')->name('sectionUpdateSectionData');
    });

});
