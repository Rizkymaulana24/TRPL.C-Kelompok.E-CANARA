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

// // ! DEV MODE ONLY \/
// Route::get('/forcelogout', function ()
// {
//     Auth::logout();
//     return redirect()->route('welcome');
// });
// // ! DEV MODE ONLY /\

Route::view('/', 'welcome')->middleware('guest')->name('welcome');

// Auth
Route::get('login', 'AuthController@showLoginForm')->name('login');
Route::post('login', 'AuthController@login');
Route::get('register', 'AuthController@showRegisterForm')->name('register');
Route::get('registerprem', 'AuthController@showRegisterpremForm')->name('registerprem');
Route::post('store', 'AuthController@pengguna_store')->name('store');
Route::post('storeprem', 'AuthController@pengguna_storeprem')->name('storeprem');
Route::post('register', 'AuthController@register');
Route::post('logout', 'AuthController@logout')->name('logout');

// Admin Dashboard
Route::group(['prefix' => 'admin'], function ()
{
    Route::name('admin')->group(function()
    {

        // url : /admin
        Route::get('/', 'AdminController@index');
        Route::get('/profile', 'AdminController@profile')->name('.profile');
        Route::get('/profile/edit', 'AdminController@edit')->name('.edit');
        Route::get('/profile/password', 'AdminController@password')->name('.password');
        Route::put('/profile/update', 'AdminController@update')->name('.update');
        Route::put('/profile/update/password', 'AdminController@updatePassword')->name('.updatePassword');

        Route::name('.narasumberfree')->group(function()
        {
            // url : /admin/narasumber
            Route::group(['prefix' => 'narasumberfree'], function ()
            {
                Route::get('/', 'AdminController@narasumber_index');
                Route::get('/create', 'AdminController@narasumber_create')->name('.create');
                Route::post('/store', 'AdminController@narasumber_store')->name('.store');
                Route::get('/{id}', 'AdminController@narasumber_show')->name('.show');
                Route::get('/{id}/edit', 'AdminController@narasumber_edit')->name('.edit');
                Route::put('/{id}', 'AdminController@narasumber_update')->name('.update');
            });
        });

        Route::name('.narasumberpremium')->group(function()
        {
            // url : /admin/narasumberprem
            Route::group(['prefix' => 'narasumberpremium'], function ()
            {
                Route::get('/', 'AdminController@narasumberprem_index');
                Route::get('/{id}', 'AdminController@narasumberprem_show')->name('.show');
            });
        });

        Route::name('.penyelenggarafree')->group(function()
        {
            // url : /admin/penyelenggara
            Route::group(['prefix' => 'penyelenggarafree'], function ()
            {
                Route::get('/', 'AdminController@penyelenggara_index');
                Route::get('/create', 'AdminController@penyelenggara_create')->name('.create');
                Route::post('/store', 'AdminController@penyelenggara_store')->name('.store');
                Route::get('/{id}', 'AdminController@penyelenggara_show')->name('.show');
                Route::get('/{id}/edit', 'AdminController@penyelenggara_edit')->name('.edit');
                Route::put('/{id}', 'AdminController@penyelenggara_update')->name('.update');
            });
        });

        Route::name('.penyelenggarapremium')->group(function()
        {
            // url : /admin/penyelenggara
            Route::group(['prefix' => 'penyelenggarapremium'], function ()
            {
                Route::get('/', 'AdminController@penyelenggaraprem_index');
                Route::get('/create', 'AdminController@penyelenggara_create')->name('.create');
                Route::post('/store', 'AdminController@penyelenggara_store')->name('.store');
                Route::get('/{id}', 'AdminController@penyelenggaraprem_show')->name('.show');
                Route::get('/{id}/edit', 'AdminController@penyelenggara_edit')->name('.edit');
                Route::put('/{id}', 'AdminController@penyelenggara_update')->name('.update');
            });
        });

        Route::name('.kegiatan')->group(function()
        {
            // url : /admin/kegiatan
            Route::get('/kegiatan', 'AdminController@kegiatan_index');
            Route::get('/create', 'AdminController@kegiatan_create')->name('.create');
            Route::post('/store', 'AdminController@kegiatan_store')->name('.store');
            Route::get('/{id}', 'AdminController@kegiatan_show')->name('.show');
            Route::get('/{id}/edit', 'AdminController@kegiatan_edit')->name('.edit');
            Route::put('/{id}', 'AdminController@kegiatan_update')->name('.update');
            Route::get('/{id}/decline', 'AdminController@kegiatan_decline')->name('.decline');
            Route::get('/{id}/approve', 'AdminController@kegiatan_approve')->name('.approve');
        });
    });

    // fallback url : /admin/any
    Route::fallback(function()
    {
        return redirect()->route('admin');
    });
});

// Narasumber Dashboard
Route::group(['prefix' => 'narasumber'], function ()
{
    Route::name('narasumber')->group(function()
    {

        // url : /narasumber
        Route::get('/', 'NarasumberController@index');
        Route::get('/profile', 'NarasumberController@profile')->name('.profile');
        Route::get('/profile/edit', 'NarasumberController@edit')->name('.edit');
        Route::get('/profile/password', 'NarasumberController@password')->name('.password');
        Route::put('/profile/update', 'NarasumberController@update')->name('.update');
        Route::put('/profile/update/password', 'NarasumberController@updatePassword')->name('.updatePassword');
        Route::get('/pencarian', 'NarasumberController@pencarian')->name('.pencarian');
        Route::get('/cari', 'NarasumberController@cari')->name('.cari');
        
        Route::name('.pencarian')->group(function()
        {
            // url : /admin/penyelenggara
            Route::get('/pencarian/show/{id}', 'NarasumberController@show')->name('.show');
        });

        Route::name('.kegiatan')->group(function()
        {
            // url : /Narasumber/kegiatan
            Route::get('/kegiatan', 'NarasumberController@kegiatan_index');
        });
    });

    // fallback url : /narasumberprem/any
    Route::fallback(function()
    {
        return redirect()->route('narasumberprem');
    });
});

// narasumberprem Dashboard
Route::group(['prefix' => 'narasumberprem'], function ()
{
    Route::name('narasumberprem')->group(function()
    {

        // url : /narasumberprem
        Route::get('/', 'NarasumberpremController@index');
        Route::get('/profile', 'NarasumberpremController@profile')->name('.profile');
        Route::get('/profile/edit', 'NarasumberpremController@edit')->name('.edit');
        Route::get('/profile/password', 'NarasumberpremController@password')->name('.password');
        Route::put('/profile/update', 'NarasumberpremController@update')->name('.update');
        Route::put('/profile/update/password', 'NarasumberpremController@updatePassword')->name('.updatePassword');
        Route::get('/pencarian', 'NarasumberpremController@pencarian')->name('.pencarian');
        Route::get('/cari', 'NarasumberpremController@cari')->name('.cari');

        Route::name('.pencarian')->group(function()
        {
            // url : /Narasumberprem/kegiatan
            Route::get('/pencarian/show/{id}', 'NarasumberpremController@show')->name('.show');
        });
    });

    // fallback url : /Narasumberprem/any
    Route::fallback(function()
    {
        return redirect()->route('narasumberprem');
    });
});

// Penyelenggara Dashboard
Route::group(['prefix' => 'penyelenggara'], function ()
{
    Route::name('penyelenggara')->group(function()
    {

        // url : /penyelenggara
        Route::get('/', 'PenyelenggaraController@index');
        Route::get('/profile', 'PenyelenggaraController@profile')->name('.profile');
        Route::get('/profile/edit', 'PenyelenggaraController@edit')->name('.edit');
        Route::get('/profile/password', 'PenyelenggaraController@password')->name('.password');
        Route::put('/profile/update', 'PenyelenggaraController@update')->name('.update');
        Route::put('/profile/update/password', 'PenyelenggaraController@updatePassword')->name('.updatePassword');
        Route::get('/pencarian', 'PenyelenggaraController@pencarian')->name('.pencarian');
        Route::get('/cari', 'PenyelenggaraController@cari')->name('.cari');

        Route::name('.pencarian')->group(function()
        {
            
            Route::get('/pencarian/show/{id}', 'PenyelenggaraController@show')->name('.show');
        });

        Route::name('.kegiatan')->group(function()
        {
            // url : /Penyelenggara/kegiatan
            Route::get('/kegiatan', 'PenyelenggaraController@kegiatan_index');
            Route::get('/kegiatan/create', 'PenyelenggaraController@kegiatan_create')->name('.create');
            Route::post('/kegiatan/store', 'PenyelenggaraController@kegiatan_store')->name('.store');
            Route::get('/kegiatan/{id}', 'PenyelenggaraController@kegiatan_show')->name('.show');
            Route::get('/kegiatan/{id}/edit', 'PenyelenggaraController@kegiatan_edit')->name('.edit');
            Route::put('/kegiatan/{id}', 'PenyelenggaraController@kegiatan_update')->name('.update');
        });
    });

    // fallback url : /Penyelenggara/any
    Route::fallback(function()
    {
        return redirect()->route('penyelenggara');
    });
});

// penyelenggaraprem Dashboard
Route::group(['prefix' => 'penyelenggaraprem'], function ()
{
    Route::name('penyelenggaraprem')->group(function()
    {

        // url : /penyelenggaraprem
        Route::get('/', 'PenyelenggarapremController@index');
        Route::get('/profile', 'PenyelenggarapremController@profile')->name('.profile');
        Route::get('/profile/edit', 'PenyelenggarapremController@edit')->name('.edit');
        Route::get('/profile/password', 'PenyelenggarapremController@password')->name('.password');
        Route::put('/profile/update', 'PenyelenggarapremController@update')->name('.update');
        Route::put('/profile/update/password', 'PenyelenggarapremController@updatePassword')->name('.updatePassword');
        Route::get('/pencarian', 'PenyelenggarapremController@pencarian')->name('.pencarian');
        Route::get('/cari', 'PenyelenggarapremController@cari')->name('.cari');

        Route::name('.pencarian')->group(function()
        {
            
            Route::get('/pencarian/show/{id}', 'PenyelenggarapremController@show')->name('.show');
        });

        Route::name('.kegiatan')->group(function()
        {
            // url : /Penyelenggaraprem/kegiatan
            Route::get('/kegiatan', 'PenyelenggarapremController@kegiatan_index');
            Route::get('/create', 'PenyelenggarapremController@kegiatan_create')->name('.create');
            Route::post('/store', 'PenyelenggarapremController@kegiatan_store')->name('.store');
            Route::get('/{id}', 'PenyelenggarapremController@kegiatan_show')->name('.show');
            Route::get('/{id}/edit', 'PenyelenggarapremController@kegiatan_edit')->name('.edit');
            Route::put('/{id}', 'PenyelenggarapremController@kegiatan_update')->name('.update');
        });
    });

    // fallback url : /Penyelenggaraprem/any
    Route::fallback(function()
    {
        return redirect()->route('penyelenggaraprem');
    });
});


// fallback url : /any
Route::fallback(function()
{
    return redirect()->route('login');
});