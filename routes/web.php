<?php

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index')->name('home');

    Route::prefix('auth')->group(function () {
        
        Route::get('/login', 'AuthController@login')->name('auth.login');
        Route::post('/login', 'AuthController@submitLogin')->name('auth.login');

        Route::post('/register', 'AuthController@submitRegister')->name('register');

        
        Route::get('/profile', 'AuthController@logout')->name('logout');
        Route::get('/logout', 'AuthController@logout')->name('logout');
    });
    
    Route::prefix('portal')->group(function () {
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
        Route::get('/', 'ProductController@index')->name('products');

        Route::group(['prefix' =>'profile'], function(){
            Route::get('/', 'ProfileController@view');
            Route::post('/', 'ProfileController@store');
            Route::post('/change_password/', 'ProfileController@changePassword');
        });

        Route::prefix('products')->group(function () {
            Route::get('/', 'ProductController@index')->name('products');
        });

        Route::prefix('products/variants')->group(function () {
            Route::get('/', 'ProductVariantController@index')->name('products.variants');
        });

        Route::prefix('product-categories')->group(function () {
            Route::get('/', 'ProductCategoryController@index')->name('product-categories');
            Route::post('/', 'ProductCategoryController@store')->name('product-categories.store');
            Route::post('/{id}', 'ProductCategoryController@update')->name('product-categories.update');
            Route::delete('/delete/{id}', 'ProductCategoryController@destroy')->name('product-categories.destroy');
        });

        Route::prefix('users')->group(function () {
            Route::get('/', 'UserController@index')->name('users');
        });

        Route::prefix('tables')->group(function () {
            Route::get('/', 'TableController@index')->name('tables');
        });
    });


