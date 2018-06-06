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

Route::get('/', 'DashboardController@index')->name('home');


Route::get('/import/data/eid', 'ImportController@eiddata')->name('import_eid_data');
Route::get('/import/data/vl', 'ImportController@vldata')->name('import_vl_data');