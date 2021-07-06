<?php

use Illuminate\Support\Facades\Route;

// menuSection
 Route::group(['prefix' => '/menuSection'], function (){
    Route::get('/',             'MenuController@index')->name('backend.menuSection.index');
    Route::get('/create',       'MenuController@create')->name('backend.menuSection.create');
    Route::post('/store',       'MenuController@store')->name('backend.menuSection.store');
    Route::get('/edit/{id}',    'MenuController@edit')->name('backend.menuSection.edit');
    Route::post('/update/{id}', 'MenuController@update')->name('backend.menuSection.update');
    Route::get('/delete/{id}',  'MenuController@destroy')->name('backend.menuSection.destroy');
});
