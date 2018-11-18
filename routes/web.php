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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::match(['get', 'post'], 'register', function(){return redirect('/');});//Disable register

Route::prefix('admin')->group(function () {
    Route::prefix('product')->group(function () {
        Route::get('/', 'Admin\ProductController@index')->name('admin.product');
        Route::post('/', 'Admin\ProductController@create')->name('admin.product.add');
        Route::get('/{id}', 'Admin\ProductController@detail')->name('admin.product.detail');
        Route::get('status/{id}/{active}', 'Admin\ProductController@status')->name('admin.product.status');
    });
    Route::prefix('partnership')->group(function () {
        Route::get('/', 'Admin\PartnershipController@index')->name('admin.partnership');
        Route::post('/', 'Admin\PartnershipController@create')->name('admin.partnership.add');
        Route::get('/{id}', 'Admin\PartnershipController@detail')->name('admin.partnership.detail');
        Route::get('status/{id}/{active}', 'Admin\PartnershipController@status')->name('admin.partnership.status');
    });
});

Route::get('/home', 'Admin\HomeController@index')->name('home');
