<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/marketplaceSection'], function (){
    Route::get('/index',            'MarketController@index')->name('backend.marketplaceSection.index');
    Route::get('/create',           'MarketController@create')->name('backend.marketplaceSection.create');
    Route::post('/store',           'MarketController@store')->name('backend.marketplaceSection.store');
    Route::get('/edit/{id}',        'MarketController@edit')->name('backend.marketplaceSection.edit');
    Route::post('/update/{id}',     'MarketController@update')->name('backend.marketplaceSection.update');
    Route::get('/delete/{id}',      'MarketController@destroy')->name('backend.marketplaceSection.destroy');
    Route::get('/name',             'MarketController@name')->name('backend.marketplaceSection.name');
    Route::post('/name/store',      'MarketController@nameStore')->name('backend.marketplaceSection.name.store');
});
