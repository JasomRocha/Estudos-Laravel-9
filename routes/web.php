<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

// AULA 2 - ROTAS NOMEADAS
// Utilizar pré fixos para quando houverem varias homes, views etc.
// Rotas nomeadas tornam a URI flexível, pois o que define a rota é o nome dela definido no "name"
Route::get('/', [SiteController::class, 'home'])->name('site.home');
Route::get('/contato', [SiteController::class, 'contact'])->name('site.contact');
