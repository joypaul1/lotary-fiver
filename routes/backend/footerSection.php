
<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/footer'], function (){
    Route::get('/text',       'FooterController@index')->name('backend.footer.Section.index');
    Route::post('/text',      'FooterController@index')->name('backend.footer.Section.index');

});
