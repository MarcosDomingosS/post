<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Estrutura Route:
// Route::(method)('uri', function(){return Algo ou nada};)
// Exemplo:

Route::get('/', function () {
    return view('home');
    // Retorna a view home que está em estudando-laravel/resources/views/home.blade.php

}); // Utiliza o metodo get (entra basicamente), e quando entrar na uri fará a função que estiver definida


// Tipos de métodos:
/**
 * Padrões (não requerem de especificação do método):
 * GET:  Define uma rota para o método HTTP GET (usado para recuperar dados).
 * POST: Define uma rota para o método HTTP POST (usado para enviar dados).
 *
 * Adicionados no laravel (requerem especificação do método):
 * PUT: Define uma rota para o método HTTP PUT (usado para substituir dados).
 * PATCH: Define uma rota para o método HTTP PATCH (usado para atualizar dados parcialmente).
 * DELETE: Define uma rota para o método HTTP DELETE (usado para excluir dados).
 * ANY: Define uma rota que pode responder a qualquer método HTTP (GET, POST, etc.).
 * MATCH: Define uma rota para responder a métodos HTTP específicos.
 * RESOURCE: Define um conjunto de rotas RESTful para um controlador de recursos.
 * REDIRECT: Define uma rota que realiza um redirecionamento para outra URL.
 * VIEW: Define uma rota que retorna diretamente uma view.
 */

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create']);
Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/{id}', [PostController::class, 'show']);
Route::get('/posts/{id}/edit', [PostController::class, 'edit']);
Route::put('posts/{id}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
