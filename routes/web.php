<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;

Route::get('/', function () {
    return view('welcome');
});

// APIs

Route::get('/products', function () {
    return Product::All();
});
