<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/social'], function () {
    Route::get('/', 'SocialCOntroller@index')->name('backend.social.index');
    Route::post('/store', 'SocialCOntroller@store')->name('backend.social.store');
});
