<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/todo', function () {
    return view('todo_list');
});

Route::get('/modal', function () {
    return view('modal');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/products', function () {
    return view('products');
});

// Route::get('/products', \App\Livewire\ProductCrud::class);
