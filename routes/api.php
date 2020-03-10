<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:api'], function() {
    Route::group([
		'prefix' => '/v1',
		'namespace' => 'Api\V1',
		'as' => 'api.',
	], function () {
		Route::resource('categories', 'CategoriesController', ['except' => ['create', 'edit']]);
		Route::resource('users', 'UsersController', ['except' => ['create', 'edit']]);
		Route::resource('plants', 'PlantsController', ['except' => ['create', 'edit']]);
		Route::resource('roles', 'RolesController', ['except' => ['create', 'edit']]);
		Route::resource('permissions', 'PermissionsController', ['except' => ['create', 'edit']]);
		Route::group([
			'prefix' => 'admin',
			/*'middleware' => 'apirole:admin',*/

		], function() {
		    Route::post('attachpermission', 'AdminManagerController@attachPermission');
		    Route::post('syncpermission', 'AdminManagerController@syncPermission');
		    Route::post('detachpermission', 'AdminManagerController@detachPermission');
		    Route::post('attachrole', 'AdminManagerController@attachRole');
		    Route::post('syncrole', 'AdminManagerController@syncRole');
		    Route::post('detachrole', 'AdminManagerController@detachRole');
		});
	}
	);
});