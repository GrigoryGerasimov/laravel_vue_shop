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
        Route::get('/{category}/restore', 'RestoreController')->name('categories.restore');
    });
});
