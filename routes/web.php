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


//Route::get('/admin', 'Admin\DashboardController@index');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function(){
    Route::get('/', 'DashboardController@index');
    Route::resource('categories', 'CategoryController');
    Route::resource('attributes_group', 'AttributesGroupController');
    Route::resource('attributes', 'AttributesController');
    Route::resource('products', 'ProductController');
    Route::resource('manufacturers', 'ManufacturerController');
    Route::resource('providers', 'ProviderController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
