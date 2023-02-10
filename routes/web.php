<?php

use App\Http\Controllers\AdminUserController;
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

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    /**
     * Dashboard Routes
     */

    Route::group(['middleware' => ['guest']], function () {
        /**
         * Registration Routes
         */
        Route::post('/', 'AdminUserController@create')->name('register.create');
        Route::get('/', 'AdminUserController@show')->name('register.show');
        Route::get('/login', 'AdminUserController@show_login')->name('login.show');
        Route::post('/login', 'AdminUserController@login_auth')->name('login.auth');
     });

    Route::group(['middleware' => ['auth']], function () {
        /**
         * Protected Routes
         */
        Route::get('/dashboard', 'DashboardController@show')->name('dashboard.show');
        Route::get('/logout', 'DashboardController@logout')->name('logout');
        Route::post('/dashboard', 'AdminUserController@create')->name('register.create_user');
    });
 });
