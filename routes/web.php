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

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::group(['prefix' => 'news'], function () {
        Route::get('create', 'Admin\NewsController@add');
        Route::post('create', 'Admin\NewsController@create');
        Route::get('/', 'Admin\NewsController@index');
        Route::get('edit', 'Admin\NewsController@edit');
        Route::post('edit', 'Admin\NewsController@update');
        Route::get('delete', 'Admin\NewsController@delete');
    });
    
    Route::group(['prefix' => 'profile'], function () {
        Route::get('create', 'Admin\ProfileController@add');
        Route::post('create', 'Admin\ProfileController@create');
        Route::get('/', 'Admin\ProfileController@index');
        Route::get('edit', 'Admin\ProfileController@edit');
        Route::post('edit', 'Admin\ProfileController@update');
        Route::get('delete', 'Admin\ProfileController@delete');
    });
});
Auth::routes();
Route::get('/', 'NewsController@index');

Route::get('/home', 'HomeController@index')->name('home');