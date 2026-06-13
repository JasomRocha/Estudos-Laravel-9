<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', function () {
        echo "Dashboard admin";
    })->name('dashboard');
});
