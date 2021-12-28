<?php
use App\Http\Controllers\{
    PostController
};

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/posts/create', [PostController::class, 'create'])->name('post.create');
Route::get('/posts', [PostController::class, 'index'] )->name('post.index');
//rota para inserir dados
Route::post('/posts', [PostController::class, 'store'])->name('post.store');
//rota para recuperar informação atraves do id e editar.
Route::get('/posts/{id}', [PostController::class, 'show' ])->name('post.show');
//rota para deletar
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('post.destroy');
Route::get('/posts/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
Route::put('/posts/{id}', [PostController::class, 'update'])->name('post.update');
Route::get('/', function () {
    return view('welcome');
});
