<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
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


Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('realizarLogin', [AuthController::class, 'realizarLogin'])->name('realizarLogin');
Route::get('cadastro', [AuthController::class, 'cadastro'])->name('cadastro');
Route::post('realizarCadastro', [AuthController::class, 'realizarCadastro'])->name('realizarCadastro');
Route::get('dashboard', [AuthController::class, 'dashboard']);
Route::get('sair', [AuthController::class, 'sair'])->name('sair');

Route::get('/processodeadocao', [HomeController::class, 'processo_de_adocao']);
Route::get('/casesdesucesso', [HomeController::class, 'cases_de_sucesso']);

/*Rotas do admin*/
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('registro_de_crianca', [AdminController::class, 'registro_de_crianca'])->name('registro_de_crianca');
    Route::get('registro_de_familia', [AdminController::class, 'registro_de_familia'])->name('registro_de_familia');
    Route::post('registrarCrianca', [AdminController::class, 'registrarCrianca'])->name('registrarCrianca');
    Route::post('registrarFamilia', [AdminController::class, 'registrarFamilia'])->name('registrarFamilia');
    Route::post('aprovarAdocao', [AdminController::class, 'aprovarAdocao'])->name('aprovarAdocao');
    Route::post('reprovarAdocao', [AdminController::class, 'reprovarAdocao'])->name('reprovarAdocao');
    Route::post('aprovarAdocaoGrupo', [AdminController::class, 'aprovarAdocaoGrupo'])->name('aprovarAdocaoGrupo');
    Route::post('reprovarAdocaoGrupo', [AdminController::class, 'reprovarAdocaoGrupo'])->name('reprovarAdocaoGrupo');
    Route::get('/adocoes-pendentes', [AdminController::class, 'adocoesPendentes']);
    Route::get('/candidatos-a-pais', [AdminController::class, 'candidatosAPais']);
});

/*Rotas do user*/
Route::post('registrarAdocao', [UserController::class, 'registrarAdocao'])->name('registrarAdocao');
Route::post('registrarAdocaoFamilia', [UserController::class, 'registrarAdocaoFamilia'])->name('registrarAdocaoFamilia');
Route::get('/minhas-adocoes', [UserController::class, 'minhasAdocoes']);
Route::get('/criancas-para-adocao', [UserController::class, 'criancasParaAdocao']);
Route::get('/crianca/{nome}/{id}', [UserController::class, 'conteudoCriancas']);
Route::get('/familias-para-adocao', [UserController::class, 'familiasParaAdocao']);
Route::get('/familia/{id}', [UserController::class, 'conteudoFamilias']);
Route::post('cancelarSolicitacaoDeAdocao', [UserController::class, 'cancelarSolicitacaoDeAdocao'])->name('cancelarSolicitacaoDeAdocao');
Route::post('AdocaoBemSucedida', [UserController::class, 'AdocaoBemSucedida'])->name('AdocaoBemSucedida');
Route::post('AdocaoMalSucedida', [UserController::class, 'AdocaoMalSucedida'])->name('AdocaoMalSucedida');
Route::post('registrarFotoDaFamilia', [UserController::class, 'store'])->name('registrarFotoDaFamilia');

Route::post('cancelarSolicitacaoDeAdocaoGrupo', [UserController::class, 'cancelarSolicitacaoDeAdocaoGrupo'])->name('cancelarSolicitacaoDeAdocaoGrupo');
Route::post('AdocaoBemSucedidaGrupo', [UserController::class, 'AdocaoBemSucedidaGrupo'])->name('AdocaoBemSucedidaGrupo');
Route::post('AdocaoMalSucedidaGrupo', [UserController::class, 'AdocaoMalSucedidaGrupo'])->name('AdocaoMalSucedidaGrupo');
Route::post('registrarFotoDaFamiliaGrupo', [UserController::class, 'storeGrupo'])->name('registrarFotoDaFamiliaGrupo');
Route::post('entrarFila', [UserController::class, 'entrarFila'])->name('entrarFila');

/*Busca*/
Route::get('/busca', [MainController::class, 'realizarBusca'])->name('busca');



