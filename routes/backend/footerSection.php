
<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/footer'], function (){
    Route::get('/index',       'FooterController@index')->name('backend.footer.Section.index');
    Route::post('/store',     'FooterController@store')->name('backend.footer.Section.store');

});
