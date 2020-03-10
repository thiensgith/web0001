<?php

return [
	'web' => null,

	'api' => [
		['address' => 'CategoriesController@index',
		'name' => 'Index Category'],
		['address' => 'CategoriesController@store',
		'name' => 'Store Category'],
		['address' => 'CategoriesController@show',
		'name' => 'Show Category'],
		['address' => 'CategoriesController@update',
		'name' => 'Update Category'],
		['address' => 'CategoriesController@destroy',
		'name' => 'Destroy Category'],

		['address' => 'PlantsController@index',
		'name' => 'Index Plant'],
		['address' => 'PlantsController@store',
		'name' => 'Store Plant'],
		['address' => 'PlantsController@show',
		'name' => 'Show Plant'],
		['address' => 'PlantsController@update',
		'name' => 'Update Plant'],
		['address' => 'PlantsController@destroy',
		'name' => 'Destroy Plant'],

		['address' => 'UsersController@index',
		'name' => 'Index User'],
		['address' => 'UsersController@store',
		'name' => 'Store User'],
		['address' => 'UsersController@show',
		'name' => 'Show User'],
		['address' => 'UsersController@update',
		'name' => 'Update User'],
		['address' => 'UsersController@destroy',
		'name' => 'Destroy User'],
	],
];