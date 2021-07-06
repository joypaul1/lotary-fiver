<?php

use Illuminate\Support\Facades\Route;

// TOKENOMIKS
// tokennomiks
 Route::group(['prefix' => '/tokennomiks'], function (){
    Route::get('/',             'TokenController@index')->name('backend.tokennomiks.index');
    Route::get('/create',       'TokenController@create')->name('backend.tokennomiks.create');
    Route::get('/edit/{id}',    'TokenController@edit')->name('backend.tokennomiks.edit');
    Route::get('/update/{id}',  'TokenController@update')->name('backend.tokennomiks.update');
    Route::get('/delete/{id}',  'TokenController@destroy')->name('backend.tokennomiks.destroy');

});
