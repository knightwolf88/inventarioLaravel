<?php

use App\Http\Controllers\productosController;
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

Route::get('/', function () {
    //return view('welcome');
    return 'hola mundo';
});

Route::get('/inventario', function () {
    return view('inventario');
});

Route::get('/productos', [productosController::class,'index']);

Route::post('/productos/listar', [productosController::class,'listar']);

Route::post('/productos/datosProducto', [productosController::class,'datosProducto']);

Route::post('/productos/insertar', [productosController::class,'insertar']);

Route::post('/productos/editar', [productosController::class,'editar']);

Route::post('/productos/estado', [productosController::class,'estado']);