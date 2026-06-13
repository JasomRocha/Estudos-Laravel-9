<?php

use Illuminate\Support\Facades\Route;

Route::group(['as' => 'site.'], function () {
    Route::get('/', function() {
        echo 'Home';
    })->name('home');
});
