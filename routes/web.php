<?php
// Route::prefix('/home')->group(function(){
//     Route::get('/login', 'HomeController@index')->name('login');

// });
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/login', 'LoginController@index')->name('login');
Route::get('/signin', 'SigninController@index')->name('signin');





Route::get('/', function() {
   return redirect('portal');
});
Route::prefix('portal')->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/', 'ProductController@index')->name('products');

    Route::prefix('products')->group(function () {
        Route::get('/', 'ProductController@index')->name('products');
    });

    Route::prefix('products/variants')->group(function () {
        Route::get('/', 'ProductVariantController@index')->name('products.variants');
    });

    Route::prefix('product-categories')->group(function () {
        Route::get('/', 'ProductCategoryController@index')->name('product-categories');
    });

    Route::prefix('users')->group(function () {
        Route::get('/', 'UserController@index')->name('users');
    });

    Route::prefix('tables')->group(function () {
        Route::get('/', 'TableController@index')->name('tables');
    });
});


