<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\FacturaController;

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

Route::view('/', "login")->name("home");

Route::view('/login', "login")->name("login");
Route::view('/registro', "register")->name("registro");
Route::view('/privada', "secret")->middleware('auth')->name("privada");

Route::post('/validar-registro', [LoginController::class, 'register'])->name("validar-registro");
Route::post('/iniciar-sesion', [LoginController::class, 'login'])->name("iniciar-sesion");
Route::post('/logout', [LoginController::class, 'logout'])->name("logout");

Route::get('/productos', [ProductoController::class, 'index'])->middleware('auth')->middleware('admin')->name("productos");
Route::post('/productos', [ProductoController::class, 'store'])->middleware('auth')->middleware('admin')->name("registrar-producto");
Route::get('/producto/{id}', [ProductoController::class, 'show'])->middleware('auth')->middleware('admin')->name("producto");

Route::patch('/productos/{id}', [ProductoController::class, 'update'])->middleware('auth')->middleware('admin')->name("actualizar-producto");
Route::delete('/producto/{id}', [ProductoController::class, 'delete'])->middleware('auth')->middleware('admin')->name("eliminar-producto");

Route::get('/compra', [CompraController::class, 'index'])->middleware('auth')->name("compra");
Route::post('/compra', [CompraController::class, 'store'])->middleware('auth')->name("registrar-compra");

Route::get('/facturas', [FacturaController::class, 'index'])->middleware('auth')->middleware('admin')->name("facturas");
Route::post('/facturas', [FacturaController::class, 'store'])->middleware('auth')->middleware('admin')->name("generar-facturas");
Route::get('/factura/{id}', [FacturaController::class, 'show'])->middleware('auth')->middleware('admin')->name("factura");
