<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/headerSection'], function (){
    Route::get('/title_logo',       'HeaderController@logoTitele')->name('backend.headerSection.title_logo');
    Route::post('/logoTtile/store', 'HeaderController@logoTiteleStore')->name('backend.headerSection.title_logo.store');
    Route::get('/image',            'HeaderController@image')->name('backend.headerSection.image');
    Route::post('/image/store',     'HeaderController@imageStore')->name('backend.headerSection.image.store');
});
