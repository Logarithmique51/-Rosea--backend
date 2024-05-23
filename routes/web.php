<?php

use App\Events\ProductCreated;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    ProductCreated::dispatch();
    $product = new ProductCreated();
    // broadcast(new ProductCreated());

    return view('welcome');
});

Route::get('/hello',function(){
    return response('Test API', 200)
    ->header('Content-Type', 'application/json');
});
