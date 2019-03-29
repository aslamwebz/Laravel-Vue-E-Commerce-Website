<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});

Route::post('/sales/test', 'SalesController@test')->name('sales.test');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::resource('product', 'ProductController');
	Route::resource('sales', 'SalesController');
	Route::resource('customers', 'CustomerController');
	Route::resource('purchases', 'PurchaseController');
	Route::resource('suppliers', 'SupplierController');
	// Route::resource('orders', 'OrderController');
	// Route::resource('projects', 'ProjectController');
	// Route::resource('messages', 'MessageController');
	// Route::resource('softwares', 'SoftwareController');
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

Route::get('/{any}', 'HomeController@index')->where('any', '.*');

