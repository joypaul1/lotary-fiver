<?php

use Illuminate\Support\Facades\Route;

// Categories
Route::group(['prefix' => 'categories'], function () {
    Route::get('/', 'CategoryController@index')
        ->name('backend.product.categories.index');
    Route::get('/create', 'CategoryController@create')
        ->name('backend.product.categories.create');
    Route::get('/edit/{category}', 'CategoryController@edit')
        ->name('backend.product.categories.edit');

    // non view
    Route::get('/destroy/{category}', 'CategoryController@destroy')
        ->name('backend.product.categories.destroy');
    Route::post('/store', 'CategoryController@store')
        ->name('backend.product.categories.store');
    Route::post('/update/{category}', 'CategoryController@update')
        ->name('backend.product.categories.update');
});

// SubCategories
Route::group(['prefix' => 'sub-categories'], function () {
    Route::get('/', 'SubcategoryController@index')
        ->name('backend.product.sub_categories.index');
    Route::get('/create', 'SubcategoryController@create')
        ->name('backend.product.sub_categories.create');
    Route::get('/edit/{subCategory}', 'SubcategoryController@edit')
        ->name('backend.product.sub_categories.edit');

    // non view
    Route::get('/destroy/{subCategory}', 'SubcategoryController@destroy')
        ->name('backend.product.sub_categories.destroy');
    Route::post('/store', 'SubcategoryController@store')
        ->name('backend.product.sub_categories.store');
    Route::post('/update/{subCategory}', 'SubcategoryController@update')
        ->name('backend.product.sub_categories.update');
});

// Origins
Route::group(['prefix' => 'origins'], function () {
    Route::get('/', 'OriginController@index')
        ->name('backend.product.origins.index');
    Route::get('/create', 'OriginController@create')
        ->name('backend.product.origins.create');
    Route::get('/edit/{origin}', 'OriginController@edit')
        ->name('backend.product.origins.edit');

    // non view
    Route::get('/destroy/{origin}', 'OriginController@destroy')
        ->name('backend.product.origins.destroy');
    Route::post('/store', 'OriginController@store')
        ->name('backend.product.origins.store');
    Route::post('/update/{origin}', 'OriginController@update')
        ->name('backend.product.origins.update');
});

// Brands
Route::group(['prefix' => 'brands'], function () {
    Route::get('/', 'BrandController@index')
        ->name('backend.product.brands.index');
    Route::get('/create', 'BrandController@create')
        ->name('backend.product.brands.create');
    Route::get('/edit/{brand}', 'BrandController@edit')
        ->name('backend.product.brands.edit');

    // non view
    Route::get('/destroy/{brand}', 'BrandController@destroy')
        ->name('backend.product.brands.destroy');
    Route::post('/store', 'BrandController@store')
        ->name('backend.product.brands.store');
    Route::post('/update/{brand}', 'BrandController@update')
        ->name('backend.product.brands.update');
});

// Units
Route::group(['prefix' => 'units'], function () {
    Route::get('/', 'UnitController@index')
        ->name('backend.product.units.index');
    Route::get('/create', 'UnitController@create')
        ->name('backend.product.units.create');
    Route::get('/edit/{unit}', 'UnitController@edit')
        ->name('backend.product.units.edit');

    // non view
    Route::get('/destroy/{id}', 'UnitController@destroy')
        ->name('backend.product.units.destroy');
    Route::post('/store', 'UnitController@store')
        ->name('backend.product.units.store');
    Route::post('/update/{unit}', 'UnitController@update')
        ->name('backend.product.units.update');
});

// Item
Route::group(['prefix' => 'items'], function () {
    Route::get('/', 'ItemController@index')
        ->name('backend.product.items.index');
    Route::get('/create', 'ItemController@create')
        ->name('backend.product.items.create');
    Route::get('/edit/{id}', 'ItemController@edit')
        ->name('backend.product.items.edit');

    // non view
    Route::get('/destroy/{id}', 'ItemController@destroy')
        ->name('backend.product.items.destroy');
    Route::post('/store', 'ItemController@store')
        ->name('backend.product.items.store');
    Route::post('/update/{item}', 'ItemController@update')
        ->name('backend.product.items.update');
    Route::post('/change/feature/{item}', 'ItemController@updateFeatureImage')
        ->name('backend.product.items.change.feature-image');
    Route::post('/change/images/{item_id}/{image_id}', 'ItemController@updateOtherImage')
        ->name('backend.product.items.change.other-image');
    Route::get('/delete/feature/{item}', 'ItemController@deleteFeatureImage')
        ->name('backend.product.items.delete.feature-image');
    Route::get('/delete/images/{item_id}/{image_id}', 'ItemController@deleteOtherImage')
        ->name('backend.product.items.delete.other-image');
});
