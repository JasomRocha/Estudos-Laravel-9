<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'arena', 'as' => 'admin.'], function () {
        Route::get('/', function () {
            echo 'Dashboard de Aluno';
        })->name('dashboard');
});


