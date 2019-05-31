<?php

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();

/*
|------------------------------------------------------------------------------------
| Admin
|------------------------------------------------------------------------------------
*/
Route::group(['prefix' => ADMIN, 'as' => ADMIN . '.', 'middleware'=>['auth', 'Role:10']], function () {
    Route::get('/', 'DashboardController@index')->name('dash');
    Route::resource('users', 'UserController');
    Route::resource('colors', 'ColorController');
    Route::resource('clients', 'ClientController');
    Route::resource('sizes', 'SizeController');
    Route::resource('brands', 'BrandController');
    Route::resource('categories', 'CategoryController');
    Route::resource('purchases', 'PurchaseController');
    Route::resource('wholesellers', 'WholesellerController');
    Route::resource('shoes', 'ShoesController');
});

Route::get('/', function () {
    return view('auth.login');
});
