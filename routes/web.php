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

Route::group(['middleware' => ['auth']], function () {
    
    Route::get('/request/{kmt_id}','KomunitasController@requestUser')->name('komunitas.request');

    //routing untuk admin
    Route::group(['middleware' => ['admin']], function () {
        //Dashboard
        Route::get('/admin/{kmt_id}', 'KomunitasController@index')->name('admin.index');
        
        Route::group(['prefix' => '/admin/{kmt_id}'], function () {
            //CRUD Pengunguman
            Route::post('/pengunguman/delete', 'PengungumanController@delete')->name('pengunguman.delete');
            Route::post('/pengunguman/create', 'PengungumanController@create')->name('pengunguman.create');
            Route::patch('/pengunguman/edit', 'PengungumanController@edit')->name('pengunguman.edit');
            Route::get('/pengunguman/view/{id}', 'PengungumanController@view')->name('pengunguman.view');
    
            //CRUD Modul
        
            //CRUD User
            Route::post('/user/accept','KomunitasController@acceptUser')->name('komunitas.accept');
            Route::post('/user/remove','KomunitasController@removeUser')->name('komunitas.remove');
        });
    
    });
});

