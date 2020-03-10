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

/*
	admin/
	admin/dashboard
	admin/categories
	admin/users/
	admin/plants/
 */
Route::group(['prefix' => 'admin','middleware' => ['auth','role:admin'], 'as' => 'admin.'], function () {
	Route::get('/', 'AdminController@index')->name('index');
    Route::get('/dashboard', 'AdminController@index')->name('index');
    Route::get('/categories', 'AdminController@category')->name('categories.index');
    Route::get('/users', 'AdminController@user')->name('users.index');
    Route::get('/roles', 'AdminController@role')->name('roles.index');
    Route::get('/permissions', 'AdminController@permission')->name('permissions.index');
    Route::get('/plants', 'AdminController@plant')->name('plants.index');
});
/*
	user/
	user/dashboard
	user/profile
 */
Route::group(['prefix' => 'user','middleware' => 'auth'], function () {
	Route::view('/', 'user.dashboard')->name('user_dashboard');
    Route::view('/dashboard', 'user.dashboard')->name('user_dashboard');
    Route::view('/profile', 'user.profile')->name('user_profile');
    Route::view('/security', 'user.security')->name('user_security');
    Route::post('/avt', 'UserController@changeAvt')->name('user_avt');
    Route::post('/changepassword', 'UserController@changePassword');
    Route::post('/resettoken', 'UserController@resetToken');
});
/*
	/
	/{category_slug}
	/{category_slug}/{plant_slug}
 */
Route::get('/', 'HomeController@index')->name('home');
//Route::get('/controllers', 'HomeController@controllers')->name('home');
Route::get('/categories', 'CoreController@categories')->name('categories');
Route::get('/{category_slug}', 'CoreController@plants');
Route::get('/{category_slug}/{plant_slug}', 'CoreController@detail_plant');

