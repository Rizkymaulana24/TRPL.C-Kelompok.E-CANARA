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

/*
|------------------------------------
| Static Page
|------------------------------------
*/
Route::view('/', 'welcome');
Route::view('/about', 'about');
Route::view('/contact', 'contact');

/*
|------------------------------------
| Auth Routes
|------------------------------------
*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/*
|------------------------------------
| Farmer Dashboard Page
|------------------------------------
*/
// farmer home
Route::get('/farmer', 'FarmerController@index')->name('farmer');
// Data bertani
Route::get('/farmer/farming', 'FarmerController@index');
// Data penyiraman
Route::get('/farmer/watering', 'FarmerController@index');
// Data cuaca
Route::get('/farmer/weather', 'FarmerController@index');
// Pengaturan akun petani
Route::get('/farmer/setting', 'FarmerController@index');


/*
|------------------------------------
| Admin Dashboard Page
|------------------------------------
*/
// admin home
Route::get('/admin', 'AdminController@index')->name('admin');
// Data broadcast
Route::get('/admin/broadcast', 'AdminController@index');
// Data tanaman
Route::get('/admin/plant', 'AdminController@index');
// Data petani
Route::get('/admin/farmer', 'AdminController@index');
// Data bertani
Route::get('/admin/farming', 'AdminController@index');
// Data penyiraman
Route::get('/admin/watering', 'AdminController@index');
// Data cuaca
Route::get('/admin/weather', 'AdminController@index');
// Pengaturan akun admin
Route::get('/admin/setting', 'AdminController@index');

/*
|------------------------------------
| API untuk sensor
|------------------------------------
*/
Route::post('/api/soilmoisture', 'SoilMoistureController@store');
