<?php

use Illuminate\Support\Facades\Route;
use Laminas\Barcode\Barcode;


Route::get('/', 'ProductController@index')->name('product.index');
Route::get('/products/create', 'ProductController@create')->name('product.create');
Route::post('/products', 'ProductController@store')->name('product.store');
Route::get('/products/{product}', 'ProductController@show')->name('product.show');

Route::get('/test', function () {
// Only the text to draw is required
    $barcodeOptions = ['text' => '0987654321'];

// No required options
    $rendererOptions = [];

    $file = Barcode::factory(
        'ean13',
        'image',
        $barcodeOptions,
        $rendererOptions
    )->draw();

    $name = \Illuminate\Support\Str::random().'.png';

    imagepng($file, public_path($name));

    return view('image', compact('name'));
});

