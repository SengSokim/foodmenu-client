<?php

Route::get('/', 'HomeController@index')->name('home');
Route::post('/createorder','OrderController@createOrder')->name('order.create');
Route::group(['prefix' => 'auth', "middleware" => "auth:guest"], function () {
    Route::get('/', 'AuthController@login')->name('auth.login');
    Route::get('/login', 'AuthController@login')->name('auth.login');
    Route::get('/login/get', 'AuthController@loginGet')->name('auth.login.get');
    Route::post('/login', 'AuthController@submitLogin')->name('auth.login');

    Route::get('/forget', 'AuthController@forget');
    Route::post('/forget', 'AuthController@submitforgetPassword');

    Route::get('/verify/{phone_number}', 'AuthController@verify');
    Route::post('/verify', 'AuthController@submitVerify');

    Route::get('/reset/{phone_number}/{token}', 'AuthController@reset');
    Route::post('/reset', 'AuthController@submitResetPassword');
});

Route::get('/logout', 'AuthController@logout');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::get('/dashboard/chart/{year}/{month}', 'DashboardController@chart');
    Route::get('/dashboard/totalPerMonth/{year}', 'DashboardController@totalPerMonth');
    // Route::get('/', 'ProductController@index')->name('products');

    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', 'ProfileController@view')->name('profile');
        Route::post('/', 'ProfileController@update');
        Route::post('/change_password', 'ProfileController@changePassword');
    });

    // Dashboard
    Route::group(['prefix' => 'chart'], function () {
        Route::get('/daily_order/{y}/{m}', 'DashboardController@dailyOrder');
        Route::get('/monthly_order/{y}', 'DashboardController@monthlyOrder');
    });

    Route::prefix('products')->group(function () {
        Route::get('/', 'ProductController@index')->name('products');
        Route::get('/get', 'ProductController@product');
        Route::post('/', 'ProductController@store');
        Route::post('/{id}', 'ProductController@update');
        Route::post('/status/{id}', 'ProductController@status');
        Route::delete('/{id}', 'ProductController@destroy');
    });

    Route::prefix('product_variants')->group(function () {
        Route::get('/', 'ProductVariantController@index')->name('product_variants');
        Route::post('/', 'ProductVariantController@store')->name('product_variants.store');
        Route::post('/{id}', 'ProductVariantController@update')->name('product_variants.update');
        Route::delete('/{id}', 'ProductVariantController@destroy')->name('product_variants.destroy');
    });

    Route::prefix('categories')->group(function () {
        Route::get('/', 'ProductCategoryController@index')->name('categories');
        Route::post('/', 'ProductCategoryController@store')->name('categories.store');
        Route::post('/{id}', 'ProductCategoryController@update')->name('categories.update');
        Route::delete('/{id}', 'ProductCategoryController@destroy')->name('categories.destroy');
    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', 'UserController@index')->name('users');
        Route::get('/create', 'UserController@create')->name('users.create');
        Route::post('/create', 'UserController@store')->name('users.store');
        Route::get('/{id}', 'UserController@show')->name('users.show');
        Route::put('/{id}', 'UserController@update')->name('users.update');
        Route::post('/update_password/{id}', 'UserController@updatePassword')->name('users.password');
        Route::delete('/{id}', 'UserController@destroy')->name('users.delete');
    });


    /**
     * ROLES FEATURE
     */
    Route::group(['prefix' => 'roles'], function () {
        Route::get('/', 'RoleController@index')->name('roles');
        Route::get('/create', 'RoleController@create')->name('roles.create');
        Route::post('/store', 'RoleController@store')->name('roles.store');
        Route::get('/show/{id}', 'RoleController@show')->name('roles.show');
        Route::post('/update/{id}', 'RoleController@update')->name('roles.update');
        Route::post('/delete/{id}', 'RoleController@destroy')->name('roles.destroy');
    });

    Route::prefix('tables')->group(function () {
        Route::get('/', 'TableController@index')->name('tables');
        Route::post('/', 'TableController@store')->name('tables.store');
        Route::post('/{id}', 'TableController@update')->name('tables.update');
        Route::delete('/{id}', 'TableController@destroy')->name('tables.destroy');
        Route::get('/qr_generate/{id}', 'TableController@qr_generate')->name('tables.qr_generate');
    });

    Route::prefix('restaurants')->group(function () {
        Route::get('/profile', 'RestaurantController@profile')->name('restaurants.profile');
        Route::get('/', 'RestaurantController@edit')->name('restaurants.edit');
        Route::post('/', 'RestaurantController@update')->name('restaurants.update');
    });


    Route::prefix('setting')->group(function () {
        Route::get('/telegram/{id}', 'SettingController@telegram')->name('setting.telegram');
    });

    Route::prefix('orders')->group(function () {
        Route::get('/', 'OrderController@index')->name('orders');
        Route::post('/{id}', 'OrderController@update')->name('orders.update');
        Route::delete('/{id}', 'OrderController@deleteOrder')->name('orders.delete');
        Route::post('/status/{id}', 'OrderController@updateStatus')->name('orders.status');
    });

    Route::prefix('drivers')->group(function () {
        Route::get('/list', 'FindDriverController@list')->name('drivers');
    });
});

