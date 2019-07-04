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
Route::group(['prefix' => 'admin','middleware' => 'role:admin', 'as' => 'admin.'], function () {
    Route::get('/dashboard', 'AdminController@index')->name('index');
    Route::get('/categories', 'AdminController@category')->name('categories.index');
    Route::get('/users', 'AdminController@user')->name('users.index');
    Route::get('/plants', 'AdminController@plant')->name('plants.index');
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

