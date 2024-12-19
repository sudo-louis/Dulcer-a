<?php

use App\Http\Controllers\ApiPayPalController;
use App\Http\Controllers\ClientesLoginController;
use App\Http\Controllers\FakeStoreApiController;
use App\Http\Controllers\GithubController;
use App\Http\Controllers\IpDataController;
use App\Http\Controllers\ProductosController;
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
    return view('welcome');
});

//GitHub Login
Route::get('auth/github', [GithubController::class, 'redirect'])->name('github.login');
Route::get('auth/github/callback', [GithubController::class, 'callback']);

//Login & Register
Route::get('/register', [ClientesLoginController::class, 'index']);
Route::post('/register', [ClientesLoginController::class, 'registrar']);
Route::post('/inicio/login', [ClientesLoginController::class, 'login']);
Route::post('logout', [ClientesLoginController::class, 'logout'])->name('logout');

Route::middleware(['auth.custom'])->group(function () {
    //CATALOGO API FAKESTORE
    Route::get('/catalogo/listado', [FakeStoreApiController::class, 'productos']);
    Route::get('/catalogo/detalle/{id}', [FakeStoreApiController::class, 'productobyid']);
    //CARRITO DE COMPRAS
    Route::get('/prueba/producto', [ProductosController::class, 'productosCarrito']);
    Route::post('/carrito/agregar',[ProductosController::class, 'agregarCarrito']);
    Route::post('/carrito/quitar', [ProductosController::class, 'quitarCarrito']);
    Route::post('/carrito/incrementar', [ProductosController::class, 'incrementarCarrito']);
    Route::post('/carrito/decrementar', [ProductosController::class, 'decrementarCarrito']);
    //IPDATA
    Route::get('/inicio/index', [ProductosController::class, 'index'])->name('index');
    Route::get('/inicio/create', [ProductosController::class, 'create'])->name('inicio.create');
    Route::post('/inicio/create', [ProductosController::class, 'store'])->name('inicio.store');
    //PAYPAL API
    Route::post('pay', [ApiPayPalController::class, 'pay'])->name('payment');
    Route::get('success', [ApiPayPalController::class, 'success']);
    Route::get('error', [ApiPayPalController::class, 'error']);
    //PLANTILLAS
    Route::view('/recursos/navbar', '/recursos/navbar');
    //CONTACTO
    Route::view('/contacto', '/contacto');
});