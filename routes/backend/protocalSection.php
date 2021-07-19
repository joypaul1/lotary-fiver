<?php

use Illuminate\Support\Facades\Route;


    Route::get('/protocalSection/name',               'ProtocalController@name')->name('backend.protocalSection.name');
    Route::post('/protocalSection/name/store',         'ProtocalController@nameStore')->name('backend.protocalSection.name.store');
    Route::resource('protocalSection',                'ProtocalController', ['as' => 'backend']);

