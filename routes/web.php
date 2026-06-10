<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

// AULA 2 - ROTAS NOMEADAS
// Utilizar pré fixos para quando houverem varias homes, views etc.
// Rotas nomeadas tornam a URI flexível, pois o que define a rota é o nome dela definido no "name"
Route::get('/', [SiteController::class, 'home'])->name('site.home');
Route::get('/contato', [SiteController::class, 'contact'])->name('site.contact');

// AULA 3 - UMA ROTA, VÁRIOS VERBOS
//Route::match(['PUT', 'PATCH'], '/usuario/{id}', function(){
//    // Aceita a combinação passada no primeiro parâmetro
//});

//Route::any('/usuario/{id}', function(){
  // Aceita qualquer verbo, a própria documentação oficial desencoraja o uso
//});

// php artisan route:list --except-vendor -> Lista todas as rotas configuradas

// AULA 4 - CSRF MECANISMO DE PROTEÇÃO
//Route::get('/form', [SiteController::class, 'submitForm'])->name('site.form');
//
////Route::post('/usuario', [SiteController::class, 'store'])->name('user.store');
//
//// Dessa forma estamos informando ao laravel que qualquer requisição que venha dessa rota
//// não passará pelo midware do CSRF, o que deixa essa rota desprotegida
//// não precisaria colocar a diretiva @csrf na blade para passar o token no cabeçalho da requisição
//Route::post('/usuario', [SiteController::class, 'store'])
//    ->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class)
//    ->name('user.store');
//
//// AULA 5 - Form Spoofing - Verbo falso
//Route::get('/usuario/{id}', [SiteController::class, 'submitEditForm']);
//Route::match(['PUT', 'PATCH'],'/usuario/{user}', [SiteController::class, 'update'])
//    ->name('user.update');


// O service container do laravel já pega o query param e joga pra o seu controlador
//Route::get('/user/{id}/comments/{comment}', function (int $id) {
//    dump($id);
//})->whereNumber(['id', 'comment'])->whereAlphaNumeric([''])->whereUuid(); // é possível fazer validações já na hora que pega as rotas, uma pré-validação

// O service container do laravel já pega o query param e joga pra o seu controlador
//Route::get('/user/{id}/comments/{comment}', [SiteController::class, 'userComments']);

Route::get('/usuario/{user}', [SiteController::class, 'show'])->name('site.show');

// Podemos definir qual o atributo de usuario ue vem na rquisição
Route::get('/userEmail/{user:email}', [SiteController::class, 'showEmail'])->name('site.showEmail');

// ou ainda podemos sobrescrever os valores padrão de busca no modelo
// navegando pelos métodos do eloquent, voce consegue encontrar os parametros de busca e sobrescrever
// essa prática é fortemente desaconselhada pela comunidade e pelo próprio laravel
