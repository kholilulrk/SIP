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
        return view('auth.login');
    });



Route::group(['as'=>'admin.','middleware '=> ['auth:sanctum', 'verified', 'redirect.not.admin']], function () {
    Route::resource('dashboard', 'App\Http\Controllers\Admin\AdminController');

    Route::resource('penyewa', 'App\Http\Controllers\Admin\Penyewa\PenyewaController');
    Route::resource('pemasukan', 'App\Http\Controllers\Admin\Pemasukan\PemasukanController');
    Route::resource('pengeluaran', 'App\Http\Controllers\Admin\Pengeluaran\PengeluaranController');
    Route::resource('building', 'App\Http\Controllers\Admin\Building\BuildingController');

    
    Route::get('dashboard','App\Http\Controllers\Admin\AdminController@index')->name('dashboard.index');
    Route::get('dashboard/create','App\Http\Controllers\Admin\AdminController@store')->name('dashboard.store');
    Route::put('dashboard/update','App\Http\Controllers\Admin\AdminController@update')->name('dashboard.update');
    Route::post('dashboard/delete','App\Http\Controllers\Admin\AdminController@destroy')->name('dashboard.destroy');

    //fullcalender
    // Route::get('dashboard','App\Http\Controllers\Admin\DashboardController@index');
    // Route::get('dashboard/create','App\Http\Controllers\SuperAdmin\Dashboard\DashboardController@create');
    // Route::post('dashboard/update','App\Http\Controllers\SuperAdmin\Dashboard\DashboardController@update');
    // Route::post('dashboard/delete','App\Http\Controllers\SuperAdmin\Dashboard\DashboardController@destroy');
});
 
//)->get('/dashboard'