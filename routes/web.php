<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SingleController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// AULA 2 - ROTAS NOMEADAS
// Utilizar pré fixos para quando houverem varias homes, views etc.
// Rotas nomeadas tornam a URI flexível, pois o que define a rota é o nome dela definido no "name"
//Route::get('/', [SiteController::class, 'home'])->name('site.home');
//Route::get('/contato', [SiteController::class, 'contact'])->name('site.contact');

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

//Route::get('/usuario/{user}', [SiteController::class, 'show'])->name('site.show');

// Podemos definir qual o atributo de usuario ue vem na rquisição
//Route::get('/userEmail/{user:email}', [SiteController::class, 'showEmail'])->name('site.showEmail');

// ou ainda podemos sobrescrever os valores padrão de busca no modelo
// navegando pelos métodos do eloquent, voce consegue encontrar os parametros de busca e sobrescrever
// essa prática é fortemente desaconselhada pela comunidade e pelo próprio laravel

// Um controlador com uma única responsabilidade
// Não precisa dizer qual a action do controlador que precisa ser acessada
//Route::get('/teste', SingleController::class);

// é possível agrupar por controlador, por middleware etc...
// quanto mais você eenxugar o seu arquivo de rotas é melhor
//Route::controller(UserController::class)->group(function () {
//    Route::get('/usuario/{user}', 'show')->name('user.show');
//    Route::post('/usuario', 'store');
//    Route::match(['PUT', 'PATCH'], '/usuario/{user}/update', 'update');
//});

// podemos renomear os nomes das rotas e os nomes do parametros no uri
//Route::resource('/artigos', PostController::class)
//    ->names([
//    'index' => 'posts.index',
//    'store' => 'posts.store',
//    ])
//    ->parameters([
//    'artigos' => 'post',
//    ]);

// Agrupando por domain
//Route::domain(config('{account}.seudominio.com'))->group(function () {
//    Route::get('usuario/{user}/artigos', function ($account, $user) {
//        dump($account, $user);
//    })->name('user.artigos');
//});

// Apenas para o midlleware funcionar
//Route::get('/login', function () {
//    echo 'efetue o seu login!';
//})->name('login');

// Agrupando por middleware
//Route::middleware(['auth'])->get('/dashboard', function () {
//    Route::get('usuario/user', [SiteController::class, 'show']);
//});


//Agrupando por prefixo
//Route::prefix('admin')->group(function () {
//    Route::get('/usuario/{user}', function ($user) {
//        dump($user);
//        echo " Só acessa com o prefixo na frente, se nao vai cair num 404";
//    });
//});

// Agrupando por nome
//Route::name('admin.')->group(function () {
//    Route::get('admin/usuario/{user}', [SiteController::class, 'show'])->name('usuario.show');
//});


// Dessa forma colocamos a nossa rota depois de um midlleware, e agora limitamos
// a quantidade de requisições máximas para ele que são 5
// o laravel cuida da burocracia para mim
// Depois que fizermos mais de 5 rqusições em 1 minuto ele vai dar "429 - Too many requests"
Route::middleware(['throttle:global'])->group(function () {
    Route::get('/', [SiteController::class, 'home'])->name('home');
    Route::get('/contato', [SiteController::class, 'contact'])->name('site.contact');
});

// Outra forma seria passar os parametros depois do alias 5,1 - significa no máx 5 req a cada 1 min
Route::middleware(['throttle:5,1'])->group(function () {
    Route::get('/', [SiteController::class, 'home'])->name('home');
    Route::get('/contato', [SiteController::class, 'contact'])->name('site.contact');
});
