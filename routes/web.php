<?php

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

/* Route::get('/', function () {
    return view('welcome');
}); */
Route::get('/', [App\Http\Controllers\NotaController::class, 'index'])->name('inicio');
Route::get('detalle={id}',[App\Http\Controllers\NotaController::class, 'detalle'])->name('detalle');
Route::post('/', [App\Http\Controllers\NotaController::class, 'post_agregar'])->name('agregar');
Route::put('detalle={id}', [App\Http\Controllers\NotaController::class, 'put_editar'])->name('editar');
Route::delete('eliminar={id}', [App\Http\Controllers\NotaController::class, 'delete'])->name('eliminar');



