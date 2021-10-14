<?php
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index')->name('home');

    Route::prefix('auth')->group(function () {
        Route::get('/login', 'AuthController@login')->name('auth.login');
        Route::post('/login', 'AuthController@submitLogin')->name('auth.login');

        Route::post('/register', 'AuthController@submitRegister')->name('register');

        Route::get('/forget', 'AuthController@forget');
        Route::post('/forget', 'AuthController@submitforgetPassword');

        Route::get('/verify/{phone_number}/{code}', 'AuthController@verify');
        Route::post('/verify', 'AuthController@submitVerify');

        Route::get('/reset/{phone_number}/{token}', 'AuthController@reset');
        Route::post('/reset', 'AuthController@submitResetPassword');

        
        Route::get('/profile', 'AuthController@logout')->name('logout');
        Route::get('/logout', 'AuthController@logout')->name('logout');
    });
    
    Route::group(['prefix' =>  'portal', 'middleware' => 'web'], function () {
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
        Route::get('/', 'ProductController@index')->name('products');

        Route::group(['prefix' =>'profile'], function(){
            Route::get('/', 'ProfileController@view');
            Route::post('/', 'ProfileController@update');
            Route::post('/change_password/', 'ProfileController@changePassword');
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

        Route::prefix('product-categories')->group(function () {
            Route::get('/', 'ProductCategoryController@index')->name('product-categories');
            Route::post('/', 'ProductCategoryController@store')->name('product-categories.store');
            Route::post('/{id}', 'ProductCategoryController@update')->name('product-categories.update');
            Route::delete('/{id}', 'ProductCategoryController@destroy')->name('product-categories.destroy');
        });

        Route::prefix('users')->group(function () {
            Route::get('/', 'UserController@index')->name('users');
        });

        Route::prefix('tables')->group(function () {
            Route::get('/', 'TableController@index')->name('tables');
        });

        Route::prefix('restaurants')->group(function () {
            Route::get('/', 'RestaurantController@edit')->name('restaurants.edit');
            Route::post('/', 'RestaurantController@update')->name('restaurants.update');
        });


    });


