<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EixoController;
use App\Http\Controllers\NivelController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\PermissionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return "<h1>Rota simples</h1>";
});
Route::get('/site/register', 'App\Http\Controllers\AlunoController@register')
->name('site.register');
Route::post('/site/success', 'App\Http\Controllers\AlunoController@storeRegister')
->name('site.submit');

// Definindo as rotas de recursos
Route::resource('/eixo', 'App\Http\Controllers\EixoController');
Route::resource('/nivel', 'App\Http\Controllers\NivelController');
Route::resource('/curso', 'App\Http\Controllers\CursoController');
Route::resource('/permission', 'App\Http\Controllers\PermissionController');
Route::resource('/turmas', 'App\Http\Controllers\TurmasController');
Route::resource('/categorias', 'App\Http\Controllers\CategoriasController');
Route::resource('/alunos', 'App\Http\Controllers\AlunosController');
Route::resource('/users', 'App\Http\Controllers\UsersController');
Route::resource('/comprovantes', 'App\Http\Controllers\ComprovantesController');
Route::resource('/declaracoes', 'App\Http\Controllers\DeclaracoesController');
