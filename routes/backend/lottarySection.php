<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/lottarySection'], function (){
    Route::get('/index',            'LotteryController@index')->name('backend.lottarySection.index');
    Route::get('/create',           'LotteryController@create')->name('backend.lottarySection.create');
    Route::post('/store',           'LotteryController@store')->name('backend.lottarySection.store');
    Route::get('/edit/{id}',        'LotteryController@edit')->name('backend.lottarySection.edit');
    Route::post('/update/{id}',     'LotteryController@update')->name('backend.lottarySection.update');
    Route::get('/delete/{id}',      'LotteryController@destroy')->name('backend.lottarySection.destroy');
});
