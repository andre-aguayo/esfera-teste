<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EmpresaViewsController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\FuncionarioViewsController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

Route::get('/login', function () {
    return redirect('/login');
})->name('login');

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

/**
 * Grupo de rotas para gestao da empresa
 */
Route::group(['prefix' => 'empresa'], function () {

    //Visualizar os funcionarios da empresa
    Route::get('fuionarios/{nomeEmpresa}/{idEmpresa}', [EmpresaViewsController::class, 'index'])->name('empresa.index');

    //Pagina de cadastro de nova empresa
    Route::get('/cadastro', [EmpresaViewsController::class, 'create'])->name('empresa.create');

    //Salva a empresa 
    Route::post('/salvar', [EmpresaController::class, 'store'])->name('empresa.store');

    //Pagina de ediçao de informaçoes da emrpesa
    Route::get('/editar/{id}', [EmpresaViewsController::class, 'show'])->name('empresa.show');

    //Salva as alteraçoes da empresa
    Route::post('/atualizar/{id}', [EmpresaController::class, 'edit'])->name('empresa.edit');

    //Remove a empresa
    Route::get('/remover/{id}', [EmpresaController::class, 'destroy'])->name('empresa.destroy');
});

/**
 * Rotas para o gestao do funcionario
 */
Route::group(['prefix' => 'funcionario'], function () {

    //Pagina de formulario para cadastro de funcionario
    Route::get('/cadastro/{empresa_id}', [FuncionarioViewsController::class, 'create'])->name('funcionario.create');

    //Salva o funcionario 
    Route::post('/salvar/{empresa_id}', [FuncionarioController::class, 'store'])->name('funcionario.store');

    //Pagina de ediçao de informaçoes da emrpesa
    Route::get('/editar/{id}', [FuncionarioViewsController::class, 'show'])->name('funcionario.show');

    //Salva as alteraçoes da empresa
    Route::post('/atualizar/{id}', [FuncionarioController::class, 'update'])->name('funcionario.edit');

    //Remove o usuario da empresa
    Route::get('/remover/{id}', [FuncionarioController::class, 'destroy'])->name('funcionario.destroy');
});
