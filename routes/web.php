<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

// AULA 2 - ROTAS NOMEADAS
// Utilizar pré fixos para quando houverem varias homes, views etc.
// Rotas nomeadas tornam a URI flexível, pois o que define a rota é o nome dela definido no "name"
Route::get('/', [SiteController::class, 'home'])->name('site.home');
Route::get('/contato', [SiteController::class, 'contact'])->name('site.contact');

// AULA 3 - UMA ROTA, VÁRIOS VERBOS
Route::match(['PUT', 'PATCH'], '/usuario/{id}', function(){
    // Aceita a combinação passada no primeiro parâmetro
});

Route::any('/usuario/{id}', function(){
  // Aceita qualquer verbo, a própria documentação oficial desencoraja o uso
});

// php artisan route:list --except-vendor -> Lista todas as rotas configuradas
