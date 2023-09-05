<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\TesteController;
use App\Http\Middleware\LogAcessoMiddleware;
use Doctrine\DBAL\Portability\Middleware;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Static_;

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
/*
Route::get('/', function () {
    return "Ola seja bem vindo";asd
});
*/
Route::get('/', [PrincipalController::class, 'principal'])    
    ->name('site.index');
      

Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos'])->name('site.sobrenos');

Route::get('/contato', [ContatoController::class, 'contato'])
        ->name('site.contato');

Route::post('/contato', [ContatoController::class, 'salvar'])->name('site.contato');


Route::get('/login/{erro?}', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'autenticar'])->name('site.login');




Route::middleware('log.autenticacao:padrao,visitante')->prefix('/app')->group(function(){

    Route::get('/home', [HomeController::class, 'index'])->name('app.home');
    Route::get('/sair', [LoginController::class, 'sair'])->name('app.sair');
    Route::get('/clientes', [ClienteController::class, 'index'])->name('app.clientes');
    Route::get('/fornecedores', [FornecedorController::class, 'index'])->name('app.index');   
    Route::get('/fornecedores/listar', [FornecedorController::class, 'listar'])->name('app.fornecedor.listar');   
    Route::post('/fornecedores/listar', [FornecedorController::class, 'listar']);  
    Route::get('/fornecedores/adicionar', [FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');   
    Route::post('/fornecedores/adicionar', [FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');   
    Route::get('/produtos', [ProdutoController::class, 'index'])->name('app.produtos');

});


Route::get('/teste/{p1}/{p2}', [TesteController::class, 'teste'])->name('teste');


Route::fallback(function(){
   echo 'A rota acessada não existe!. <a href="' .route('site.index'). '">clique aqui para voltar para pagina inicial</a>';
    
});

//Route::redirect('/rota2', '/rota1');

