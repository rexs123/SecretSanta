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

Route::get('login', 'Auth\LoginController@redirectToProvider')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('login/callback/discord', 'Auth\LoginController@handleProviderCallback');

Route::get('dashboard', 'DashboardController@index')->name('dashboard');

Route::post('group/join', 'GroupController@store')->name('group.store');

Route::post('profile/create', 'ProfileController@store')->name('profile.store');
Route::post('profile/confirm/{profile}', 'ProfileController@update')->name('profile.update');
Route::delete('profile/unconfirm/{profile}', 'ProfileController@destroy')->name('profile.destroy');