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

Auth::routes();

Route::get('/', 'PostController@index')->name('home');

Route::resource('users', 'UserController');

Route::resource('roles', 'RoleController');

Route::resource('permissions', 'PermissionController');

Route::resource('posts', 'PostController');

Route::resource('calendar', 'CalendarController');
Route::get('calendar/sign-up/{calendar_event}', 'CalendarController@signUp');

Route::resource('shop', 'ShoppingCartController')->middleware('Customer');
Route::post('checkout', 'ShoppingCartController@checkout')->name('checkout')->middleware('Customer');
Route::delete('remove_item_from_cart', 'ShoppingCartController@destroy_cart_item')->name('destroy.item');