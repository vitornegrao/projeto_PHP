<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', [\App\Http\Controllers\PrincipalController::class, 'principal'])->name('site.index');
Route::get('/sobre-nos', [\App\Http\Controllers\SobreNosController::class, 'sobreNos'])->name('site.sobrenos');
Route::get('/contato', [\App\Http\Controllers\ContatoController::class, 'contato'])->name('site.contato');
Route::get('/login', function(){return 'Login'; })->name('site.login');


Route::prefix('/app')->group(function() {
    Route::get('/clientes', function(){return 'Clientes'; })->name('app.clientes');
    Route::get('/fornecedores', function(){return 'Fornecedores'; })->name('app.fornecedores');
    Route::get('/produtos', function(){return 'Produtos'; })->name('app.produtos');
});

Route::get('/rota1', function() {
    echo 'Rota 1';
})->name('site.rota1');

Route::get('/rota2', function() {
    return redirect()->route('site.rota1');
})->name('site.rota2');


//Route::redirect('/rota2', '/rota1');

Route::fallback(function() {
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">clique aqui</a> para a página inicial';
});