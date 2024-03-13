<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ColecaoController;
use App\Http\Controllers\TrabalhoController;
use App\Http\Controllers\OrientadorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Repositories\TrabalhoRepository;


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
    $t=new TrabalhoRepository();
    $rejeitados=$t->allRejeted();
    $aprovados=$t->allAproved();
    $todos=$t->allwork();
    $alluto=$t->allAutoCount();
    $allmediado=$t->allMediadoCount();
    return view('dashboard',['trabalhos'=>$t->countTcc(),'aprovados'=>$aprovados,'rejeitados'=>$rejeitados,'todos'=>$todos,'allauto'=>$alluto,'allmediado'=>$allmediado]);
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
Route::get('colecao/create', [ColecaoController::class,'create'])->middleware('admin');
Route::get('colecao/listar', [ColecaoController::class,'index'])->middleware('admin');
Route::post('colecao/registar', [ColecaoController::class,'store'])->middleware('admin');
Route::get('colecao/edit/{id}', [ColecaoController::class,'edit'])->middleware('admin');
Route::put('colecao/alterar', [ColecaoController::class,'update'])->middleware('admin');

//categoria
Route::get('categoria/create', [CategoriaController::class,'create'])->middleware('admin');
Route::post('categoria/registar', [CategoriaController::class,'store'])->middleware('admin');
Route::get('categoria/listar', [CategoriaController::class,'index'])->middleware('admin');
Route::get('categoria/edit/{id}', [CategoriaController::class,'edit'])->middleware('admin');
Route::put('categoria/alterar', [CategoriaController::class,'update'])->middleware('admin');

//orientador
Route::get('orientador/create', [OrientadorController::class,'create'])->middleware('admin');
Route::post('orientador/registar', [OrientadorController::class,'store'])->middleware('admin');
Route::get('orientador/listar', [OrientadorController::class,'index'])->middleware('admin');
Route::get('orientador/edit/{id}', [OrientadorController::class,'edit'])->middleware('admin');
Route::put('orientador/alterar', [OrientadorController::class,'update'])->middleware('admin');
//users
Route::get('user/create', [UserController::class,'create'])->middleware('admin');
Route::post('user/salvar', [UserController::class,'store'])->middleware('admin');
Route::get('user/listar', [UserController::class,'index'])->middleware('admin');
Route::PUT('user/bloquear', [UserController::class,'bloquear'])->middleware('admin');
Route::PUT('user/desbloquear', [UserController::class,'desbloquear'])->middleware('admin');
Route::get('user/aterar/{id}', [UserController::class,'edit'])->middleware('admin');
Route::PUT('user/alterar', [UserController::class,'update'])->middleware('admin');

//trabalhos-autoarquivamento-Estudantes
Route::get('trabalho/autoarquivamento/create', [TrabalhoController::class,'autoArquivamentoCreate'])->middleware('estudante');
Route::post('trabalho/autoarquivamento/registar', [TrabalhoController::class,'autoArquivamentoSave'])->middleware('estudante');
Route::get('trabalho/autoarquivamento/listar', [TrabalhoController::class,'autoArquivamentoListar'])->middleware('estudante');
Route::get('trabalho/autoarquivamento/detalhes/{id}', [TrabalhoController::class,'show'])->middleware('estudante');
Route::get('trabalho/autoarquivamento/user-edit/{id}', [TrabalhoController::class,'trabalho_user_edit'])->middleware('estudante');
Route::put('trabalho/autoarquivamento/user-update', [TrabalhoController::class,'trabalho_user_update'])->middleware('estudante');
//trabalhos-autoarquivamento-Docentes
Route::get('trabalho/autoarquivamento/criar', [TrabalhoController::class,'autoArquivamentoCreate'])->middleware('docente');
Route::post('trabalho/autoarquivamento/salvar', [TrabalhoController::class,'autoArquivamentoSave'])->middleware('docente');
Route::get('trabalho/autoarquivamento/meus-trabalhos', [TrabalhoController::class,'autoArquivamentoListar'])->middleware('docente');
Route::get('trabalho/autoarquivamento/docente/detalhes/{id}', [TrabalhoController::class,'show'])->middleware('docente');
Route::get('trabalho/autoarquivamento/docente-edit/{id}', [TrabalhoController::class,'trabalho_user_edit'])->middleware('docente');
Route::put('trabalho/autoarquivamento/docente-update', [TrabalhoController::class,'trabalho_user_update'])->middleware('docente');
//listar auto arquivamneto bibliotecario
Route::get('trabalho/auto-arquivamento/aprovar/{id}', [TrabalhoController::class,'aprovar'])->middleware('bibliotecario');
Route::put('trabalho/auto-arquivamento/regeitar', [TrabalhoController::class,'regeitar'])->middleware('bibliotecario');
Route::get('trabalho/auto-arquivamento/listar',[TrabalhoController::class,'ListarAuto']);
//trabalhos-arquivamento mediado
Route::get('trabalho/mediado/create', [TrabalhoController::class,'mediadoCreate'])->middleware('bibliotecario');
Route::post('trabalho/arquivamento-mediado/registar', [TrabalhoController::class,'mediadoSave'])->middleware('bibliotecario');
Route::get('trabalho/arquivamento-mediado/listar', [TrabalhoController::class,'arquivamentoMediadoListar'])->middleware('bibliotecario');
Route::get('trabalho/arquivamento-mediado/edit/{id}', [TrabalhoController::class,'mediado_edit'])->middleware('bibliotecario');
Route::put('trabalho/arquivamento-mediado/update', [TrabalhoController::class,'updatemediado'])->middleware('bibliotecario');

//home
Route::get('Home/sobre', [HomeController::class,'sobre']);
Route::get('Home/percorrer-titulo', [HomeController::class,'percorerrPorTitulo']);
Route::get('Home/percorerr-detalhes/{id}', [HomeController::class,'detalhes']);
Route::get('Home/percorrer-colecao', [HomeController::class,'percorerrPorColecao']);
Route::get('Home/percorerr-colecao/{id}', [HomeController::class,'trabalhoPorColecao']);
Route::get('Home/download/{file}', [HomeController::class,'download']);
Route::get('Home/pesquisar', [HomeController::class,'pesquisar']);





require __DIR__.'/auth.php';
