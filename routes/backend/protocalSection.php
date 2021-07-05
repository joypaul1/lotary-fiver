<?php

use Illuminate\Support\Facades\Route;

//  Route::group(['prefix' => '/protocalSection'], function (){

    // Route::get('/', 'PurchaseController@index')->name('backend.protocalSection.index');
    // Route::post('/create', 'PurchaseController@create')->name('backend.protocalSection.create');
    // Route::get('/edit/{id}', 'PurchaseController@create')->name('backend.protocalSection.create');
    // Route::put('/update/{id}', 'PurchaseController@create')->name('backend.protocalSection.create');
    // Route::delete('/delete/{id}', 'PurchaseController@delete')->name('backend.protocalSection.create');
    // Route::resource('protocalSection', [PurchaseController::class]);
    // Route::put('/protocalSection/update/{id}', 'PurchaseController@update')->name('backend.protocalSection.update');
    Route::get('/protocalSection/name',               'ProtocalController@name')->name('backend.protocalSection.name');
    Route::post('/protocalSection/name/store',         'ProtocalController@nameStore')->name('backend.protocalSection.name.store');
    Route::resource('protocalSection',                'ProtocalController', ['as' => 'backend']);
// });
