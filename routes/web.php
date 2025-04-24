<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChamadoController;

/*Route::get('/', function () {
    return view('home');
});*/

Route::get('/', [ChamadoController::class, 'home'])->name('home');

/*Route::get('/chamados', function () {
    return view('chamados');
});*/

Route::get('/chamados', [ChamadoController::class, 'listar'])->name('chamados');
/*Route::get('/novo-chamado', function () {
    return view('criar_chamado');
});*/
Route::get('chamados/{id}', [ChamadoController::class, 'listar_chamado'])->name('chamados.id');
Route::put('chamados/{id}', [ChamadoController::class, 'update'])->name('chamados.update');
Route::delete('chamados/{id}', [ChamadoController::class, 'delete'])->name('chamados.delete');

Route::get('/novo-chamado', [ChamadoController::class, 'index'])->name('novo-chamado');
Route::post('/novo-chamado', [ChamadoController::class, 'criar'])->name('novo-chamado');
