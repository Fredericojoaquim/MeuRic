<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ColecaoController;
use App\Http\Controllers\TrabalhoController;
use App\Http\Controllers\OrientadorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', [HomeController::class,'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//rotas de teste
Route::get('/teste', function () {
    
    return view('templates.dashboard');
});



Route::get('detalhes-teste', function () {
    
    return view('trabalhos.auto-arquivamento.detalhes');
});

//

Route::get('/login', function () {
    
    return view('layouts.login');
});

//coleção
Route::get('colecao/create', [ColecaoController::class,'create']);
Route::get('colecao/listar', [ColecaoController::class,'index']);
Route::post('colecao/registar', [ColecaoController::class,'store']);
Route::get('colecao/edit/{id}', [ColecaoController::class,'edit']);
Route::put('colecao/alterar', [ColecaoController::class,'update']);

//categoria
Route::get('categoria/create', [CategoriaController::class,'create']);
Route::post('categoria/registar', [CategoriaController::class,'store']);
Route::get('categoria/listar', [CategoriaController::class,'index']);
Route::get('categoria/edit/{id}', [CategoriaController::class,'edit']);
Route::put('categoria/alterar', [CategoriaController::class,'update']);

//trabalhos-autoarquivamento
Route::get('trabalho/autoarquivamento/create', [TrabalhoController::class,'autoArquivamentoCreate']);
Route::post('trabalho/autoarquivamento/registar', [TrabalhoController::class,'autoArquivamentoSave']);
Route::get('trabalho/autoarquivamento/listar', [TrabalhoController::class,'autoArquivamentoListar']);
Route::get('trabalho/autoarquivamento/detalhes/{id}', [TrabalhoController::class,'show']);
Route::get('trabalho/autoarquivamento/user-edit/{id}', [TrabalhoController::class,'trabalho_user_edit']);
Route::put('trabalho/autoarquivamento/user-update', [TrabalhoController::class,'trabalho_user_update']);
//listar auto arquivamneto bibliotecario
Route::get('trabalho/auto-arquivamento/aprovar/{id}', [TrabalhoController::class,'aprovar']);
Route::put('trabalho/auto-arquivamento/regeitar', [TrabalhoController::class,'regeitar']);
Route::get('trabalho/auto-arquivamento/listar',[TrabalhoController::class,'ListarAuto']);
//trabalhos-arquivamento mediado
Route::get('trabalho/mediado/create', [TrabalhoController::class,'mediadoCreate']);
Route::post('trabalho/arquivamento-mediado/registar', [TrabalhoController::class,'mediadoSave']);
Route::get('trabalho/arquivamento-mediado/listar', [TrabalhoController::class,'arquivamentoMediadoListar']);
//orientador
Route::get('orientador/create', [OrientadorController::class,'create']);
Route::post('orientador/registar', [OrientadorController::class,'store']);
Route::get('orientador/listar', [OrientadorController::class,'index']);
Route::get('orientador/edit/{id}', [OrientadorController::class,'edit']);
Route::put('orientador/alterar', [OrientadorController::class,'update']);
//users

Route::get('user/create', [UserController::class,'create']);
Route::post('user/salvar', [UserController::class,'store']);
Route::get('user/listar', [UserController::class,'index']);
Route::PUT('user/bloquear', [UserController::class,'bloquear']);
Route::PUT('user/desbloquear', [UserController::class,'desbloquear']);
Route::get('user/aterar/{id}', [UserController::class,'edit']);
Route::PUT('user/alterar', [UserController::class,'update']);
//home
Route::get('Home/sobre', [HomeController::class,'sobre']);
Route::get('Home/percorrer-titulo', [HomeController::class,'percorerrPorTitulo']);
Route::get('Home/percorerr-detalhes/{id}', [HomeController::class,'detalhes']);
Route::get('Home/percorrer-colecao', [HomeController::class,'percorerrPorColecao']);
Route::get('Home/percorerr-colecao/{id}', [HomeController::class,'trabalhoPorColecao']);
Route::get('Home/download/{file}', [HomeController::class,'download']);
Route::get('Home/pesquisar', [HomeController::class,'pesquisar']);





require __DIR__.'/auth.php';
