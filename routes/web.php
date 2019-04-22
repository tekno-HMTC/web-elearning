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
            //CRUD Pengumuman
            Route::post('/pengumuman/delete', 'PengumumanController@delete')->name('pengumuman.delete');
            Route::post('/pengumuman/create', 'PengumumanController@create')->name('pengumuman.create');
            Route::patch('/pengumuman/edit', 'PengumumanController@edit')->name('pengumuman.edit');
            Route::get('/pengumuman/view/{id}', 'PengumumanController@view')->name('pengumuman.view');
    
            //CRUD Modul
        
            //CRUD User
            Route::post('/user/accept','KomunitasController@acceptUser')->name('komunitas.accept');
            Route::post('/user/remove','KomunitasController@removeUser')->name('komunitas.remove');
        });
    
    });
});

