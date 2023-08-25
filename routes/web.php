<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers\Web'], function () {
    Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
        Route::group(['namespace' => 'Main'], function () {
            Route::get('/', 'IndexController')->name('admin.index');
        });

        Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
            Route::get('/', 'IndexController')->name('categories.index');
            Route::get('/create', 'CreateController')->name('categories.create');
            Route::post('/', 'StoreController')->name('categories.store');
            Route::get('/{category}', 'ShowController')->name('categories.show');
            Route::patch('/{category}', 'UpdateController')->name('categories.update');
            Route::get('/{category}/edit', 'EditController')->name('categories.edit');
            Route::delete('/{category}', 'DestroyController')->name('categories.destroy');
            Route::get('/{category}/restore', 'RestoreController')->withTrashed()->name('categories.restore');
        });

        Route::group(['namespace' => 'Group', 'prefix' => 'groups'], function () {
            Route::get('/', 'IndexController')->name('groups.index');
            Route::get('/create', 'CreateController')->name('groups.create');
            Route::post('/', 'StoreController')->name('groups.store');
            Route::get('/{group}', 'ShowController')->name('groups.show');
            Route::patch('/{group}', 'UpdateController')->name('groups.update');
            Route::get('/{group}/edit', 'EditController')->name('groups.edit');
            Route::delete('/{group}', 'DestroyController')->name('groups.destroy');
            Route::get('/{group}/restore', 'RestoreController')->withTrashed()->name('groups.restore');
        });

        Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function () {
            Route::get('/', 'IndexController')->name('tags.index');
            Route::get('/create', 'CreateController')->name('tags.create');
            Route::post('/', 'StoreController')->name('tags.store');
            Route::get('/{tag}', 'ShowController')->name('tags.show');
            Route::patch('/{tag}', 'UpdateController')->name('tags.update');
            Route::get('/{tag}/edit', 'EditController')->name('tags.edit');
            Route::delete('/{tag}', 'DestroyController')->name('tags.destroy');
            Route::get('/{tag}/restore', 'RestoreController')->withTrashed()->name('tags.restore');
        });

        Route::group(['namespace' => 'Color', 'prefix' => 'colors'], function () {
            Route::get('/', 'IndexController')->name('colors.index');
            Route::get('/create', 'CreateController')->name('colors.create');
            Route::post('/', 'StoreController')->name('colors.store');
            Route::get('/{color}', 'ShowController')->name('colors.show');
            Route::patch('/{color}', 'UpdateController')->name('colors.update');
            Route::get('/{color}/edit', 'EditController')->name('colors.edit');
            Route::delete('/{color}', 'DestroyController')->name('colors.destroy');
            Route::get('/{color}/restore', 'RestoreController')->withTrashed()->name('colors.restore');
        });

        Route::group(['namespace' => 'User', 'prefix' => 'users'], function () {
            Route::get('/', 'IndexController')->name('users.index');
            Route::get('/create', 'CreateController')->name('users.create');
            Route::post('/', 'StoreController')->name('users.store');
            Route::get('/{user}', 'ShowController')->name('users.show');
            Route::patch('/{user}', 'UpdateController')->name('users.update');
            Route::get('/{user}/edit', 'EditController')->name('users.edit');
            Route::delete('/{user}', 'DestroyController')->name('users.destroy');
            Route::get('/{user}/restore', 'RestoreController')->withTrashed()->name('users.restore');
        });

        Route::group(['namespace' => 'Article', 'prefix' => 'articles'], function () {
            Route::get('/', 'IndexController')->name('articles.index');
            Route::get('/create', 'CreateController')->name('articles.create');
            Route::post('/', 'StoreController')->name('articles.store');
            Route::get('/{article}', 'ShowController')->name('articles.show');
            Route::patch('/{article}', 'UpdateController')->name('articles.update');
            Route::get('/{article}/edit', 'EditController')->name('articles.edit');
            Route::delete('/{article}', 'DestroyController')->name('articles.destroy');
            Route::get('/{article}/restore', 'RestoreController')->withTrashed()->name('articles.restore');
        });
    });

    Route::group(['namespace' => 'Auth', 'prefix' => 'auth'], function () {
        Route::post('/login', 'LoginController')->name('auth.login');
        Route::post('/register', 'RegisterController')->name('auth.register');
        Route::post('/logout', 'LogoutController')->name('auth.logout');
    });

    Route::group(['namespace' => 'Main'], function () {
        Route::get('/{page}', 'IndexController')->name('main.index')->where('page', '.*');
    });
});
