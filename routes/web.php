<?php
    Route::get('/', 'AuthController@login')->name('auth.login');
    Route::group(['prefix' => 'auth'], function () {
        Route::get('/login', 'AuthController@login')->name('auth.login');
        Route::get('/login/get', 'AuthController@loginGet')->name('auth.login.get');
        Route::post('/login', 'AuthController@submitLogin')->name('auth.login');

        Route::get('/forget', 'AuthController@forget');
        Route::post('/forget', 'AuthController@submitforgetPassword');

        Route::get('/verify/{phone_number}', 'AuthController@verify');
        Route::post('/verify', 'AuthController@submitVerify');

        Route::get('/reset/{phone_number}/{token}', 'AuthController@reset');
        Route::post('/reset', 'AuthController@submitResetPassword');

        
        Route::get('/profile', 'AuthController@logout')->name('logout');
        Route::get('/logout', 'AuthController@logout')->name('logout');
    });
    
    Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
        Route::group(['prefix' =>  'admin', 'middleware' => 'auth'], function () {
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
                Route::post('/store', 'UserController@store')->name('users.store');
                Route::post('/{id}', 'UserController@update')->name('users.update');
                Route::delete('/{id}', 'UserController@destroy')->name('users.destroy');
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
                Route::get('/telegram', 'SettingController@telegram')->name('setting.telegram');
            });

            Route::prefix('orders')->group(function () {
                Route::get('/', 'OrderController@index')->name('orders.index');                
                Route::post('/{id}', 'OrderController@update')->name('orders.update');                
                Route::delete('/product/delete/{id}', 'OrderController@deleteProduct')->name('orders.product.delete');    
                Route::delete('/{id}', 'OrderController@deleteOrder')->name('orders.delete');                

            });
        });
    });


