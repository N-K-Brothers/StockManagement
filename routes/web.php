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


Route::get('/','ManageProduct@index1');

Route::get('/manageproduct','manageproduct@index')->middleware('auth','isadmin');
Route::get('/manageproduct/add','manageproduct@addform')->middleware('auth','isadmin');
Route::get('/manageproduct/update/{id}','manageproduct@updateform')->middleware('auth','isadmin');
Route::post('/manageproduct/save/{id?}','manageproduct@save')->middleware('auth','isadmin');
Route::get('/manageproduct/delete/{id}','manageproduct@delete')->middleware('auth','isadmin');
Route::get('/manageproduct/deactive/{id}','manageproduct@deactive')->middleware('auth','isadmin');
Route::get('/manageproduct/active/{id}','manageproduct@active')->middleware('auth','isadmin');
Route::post('/manageproduct/addstock/{id}','manageproduct@editstock')->middleware('auth','isadmin');
Route::get('/manageproduct/upload','manageproduct@uploadform')->middleware('auth','isadmin');
Route::post('/import_productDetails','ImportController@Import_productDetails')->middleware('auth','isadmin');
Route::get('/export_productDetails','ExportController@Export_productrDetails')->middleware('auth','isadmin');
Route::get('/dashboard','ManageDashboard@index')->middleware('auth','isadmin');
Route::get('/home','ManageDashboard@index')->middleware('auth','isadmin');
Route::post('/purchase/{id}','ManageProduct@sellProduct');
Auth::routes();


