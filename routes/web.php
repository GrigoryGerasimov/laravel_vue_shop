<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers'], function () {
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
});
