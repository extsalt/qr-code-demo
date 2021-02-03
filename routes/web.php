<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'ProductController@index')->name('product.index');
Route::get('/products/create', 'ProductController@create')->name('product.create');
Route::post('/products', 'ProductController@store')->name('product.store');
Route::get('/products/{product}', 'ProductController@show')->name('product.show');

//Route::get('/', function () {
//    return QrCode::size(250)
//        ->backgroundColor(255, 255, 204)
//        ->generate('https://48squares.com');
//});
