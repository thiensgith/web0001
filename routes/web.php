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

//Group : Login page
Auth::routes(); 
Route::group(['prefix' => 'admin','middleware' => 'role:admin'], function () {
    Route::get('/dashboard', 'AdminController@index')->name('admin_dashboard');
});
Route::group(['prefix' => 'user','middleware' => 'auth'], function () {
    Route::get('/dashboard', 'UserController@dashboard')->name('user_dashboard');
    Route::get('/profile', 'UserController@profile')->name('user_profile');
    Route::post('/avt', 'UserController@changeAvt')->name('user_avt');
});
///////////////
Route::get('/', 'HomeController@index')->name('home');
    Route::get('/{category_slug}', 'CategoryController@index');
    Route::get('/{category_slug}/{plant_slug}', 'PlantController@index');