<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'App\Http\Controllers\Api'], function() {
    Route::group(['namespace' => 'Article', 'prefix' => 'articles'], function() {
        Route::get('/', 'FilterController')->name('api.articles.index');
        Route::post('/', 'FilterController')->name('api.articles.filtered');
        Route::post('/search', 'SearchController')->name('api.articles.search');
        Route::get('/{article}', 'ShowController')->name('api.articles.show');
    });

    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function() {
        Route::get('/', 'IndexController')->name('api.categories.index');
    });

    Route::group(['namespace' => 'Color', 'prefix' => 'colors'], function() {
        Route::get('/', 'IndexController')->name('api.colors.index');
    });

    Route::group(['namespace' => 'Filter', 'prefix' => 'filterlists'], function() {
        Route::get('/', 'IndexController')->name('api.filters.index');
    });
});
