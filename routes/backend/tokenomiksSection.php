<?php

use Illuminate\Support\Facades\Route;

// tokenSection
 Route::group(['prefix' => '/tokenSection'], function (){
    Route::get('/',             'TokenController@index')->name('backend.tokenSection.index');
    Route::get('/create',       'TokenController@create')->name('backend.tokenSection.create');
    Route::post('/store',       'TokenController@store')->name('backend.tokenSection.store');
    Route::get('/right',        'TokenController@rightIndex')->name('backend.tokenSection.right.index');
    Route::post('/right/store', 'TokenController@rightStore')->name('backend.tokenSection.right.store');
    Route::get('/edit/{id}',    'TokenController@edit')->name('backend.tokenSection.edit');
    Route::post('/update/{id}', 'TokenController@update')->name('backend.tokenSection.update');
    Route::get('/delete/{id}',  'TokenController@destroy')->name('backend.tokenSection.destroy');
    Route::get('/name',         'TokenController@name')->name('backend.tokenSection.name');
    Route::post('/name/store',  'TokenController@nameStore')->name('backend.tokenSection.name.store');
});
