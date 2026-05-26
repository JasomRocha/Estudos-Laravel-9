<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

// Modelo que é possível criar um cache, ficando at'100x mais rápido
Route::get('/', [SiteController::class, 'home']);

//Route::get('/', function () {
//    return view('welcome');
//});

// GET - Read
//Route::get('/', function () {
//    return view('welcome');
//});

// POST - Update
//Route::Post('/usuario/{id}', function(){
//
//});

// PATCH - Update
//Route::patch('/usuario/{id}', function(){
//
//});

//Route::delete('/usuario/{id}', function(){
//
//});
