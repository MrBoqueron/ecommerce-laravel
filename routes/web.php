<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\PerfilController;

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

Route::get('/', [\App\Http\Controllers\ProductosController::class, 'index'])->name('home');

Route::get('/register', [\App\Http\Controllers\AuthController::class, 'register'])->name('register');
Route::post('/register', [\App\Http\Controllers\AuthController::class, 'registerUser'])->name('register');

Route::get('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'authenticate'])->name('login');

Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->can('admin.home')->middleware('auth');
Route::get('/admin/users', [\App\Http\Controllers\AdminController::class, 'users'])->name('admin.users.index')->can('admin.users.index')->middleware('auth');
Route::get('/admin/user/edit/{id}', [\App\Http\Controllers\AdminController::class, 'edit_user'])->name('admin.edituser')->can('admin.users.edit')->middleware('auth');
Route::post('/admin/user/update/{id}', [\App\Http\Controllers\AdminController::class, 'update_user'])->name('admin.updateuser')->can('admin.users.edit')->middleware('auth');
Route::get('/admin/user/destroy/{id}', [\App\Http\Controllers\AdminController::class, 'destroy_user'])->name('admin.destroyuser')->can('admin.users.destroy')->middleware('auth');  
Route::get('/admin/roles', [\App\Http\Controllers\AdminController::class, 'roles'])->name('admin.roles')->can('admin.users.edit')->middleware('auth');
Route::get('/admin/roles/edit/{id}', [\App\Http\Controllers\AdminController::class, 'roles_edit'])->name('admin.roles.edit')->can('admin.users.edit')->middleware('auth');
Route::post('/admin/roles/update/{id}', [\App\Http\Controllers\AdminController::class, 'roles_update'])->can('admin.users.edit')->name('admin.roles.update')->middleware('auth');
Route::get('/admin/permisos', [\App\Http\Controllers\AdminController::class, 'permisos'])->name('admin.permisos')->can('admin.users.permisom')->middleware('auth');

Route::get('/admin/categorias', [\App\Http\Controllers\AdminController::class, 'ver_categorias'])->name('admin.categorias')->can('categorias')->middleware('auth');
Route::get('/admin/categorias/create', [\App\Http\Controllers\AdminController::class, 'create_categorias'])->name('admin.categorias.create')->can('categorias.create')->middleware('auth');
Route::post('/admin/categorias/store', [\App\Http\Controllers\AdminController::class, 'store_categorias'])->name('admin.categorias.store')->can('categorias.create')->middleware('auth');
Route::delete('/admin/categorias/destroy/{id}', [\App\Http\Controllers\AdminController::class, 'destroy_categorias'])->name('admin.categorias.destroy')->can('categorias.destroy')->middleware('auth');
Route::get('/admin/categorias/edit/{id}', [\App\Http\Controllers\AdminController::class, 'edit_categorias'])->name('admin.categorias.edit')->middleware('auth');
Route::post('/admin/categorias/update/{id}', [\App\Http\Controllers\AdminController::class, 'update_categorias'])->name('admin.categorias.update')->middleware('auth');

Route::get('/admin/pedidos', [\App\Http\Controllers\PedidosController::class, 'index'])->name('admin.pedidos')->can('pedidos')->middleware('auth');
Route::get('/admin/pedido/ver/{id}', [\App\Http\Controllers\PedidosController::class, 'show'])->name('admin.pedido.ver')->can('pedidos')->middleware('auth');
Route::get('/admin/pedido/destroy/{id}', [\App\Http\Controllers\PedidosController::class, 'destroy'])->name('admin.pedido.destroy')->can('pedidos')->middleware('auth');

Route::get('/admin/productos', [\App\Http\Controllers\ProductosController::class, 'ver_productos'])->name('admin.productos')->middleware('auth');
Route::get('/admin/productos/create', [\App\Http\Controllers\ProductosController::class, 'create_productos'])->name('admin.productos.create')->middleware('auth');
Route::post('/admin/productos/store', [\App\Http\Controllers\ProductosController::class, 'store_productos'])->name('admin.productos.store')->middleware('auth');
Route::get('/admin/producto/ver/{id}', [\App\Http\Controllers\ProductosController::class, 'ver_producto'])->name('admin.producto.ver')->middleware('auth');
Route::get('/admin/productos/destroy/{id}', [\App\Http\Controllers\ProductosController::class, 'destroy_productos'])->name('admin.productos.destroy')->middleware('auth');

Route::get('/cart', [\App\Http\Controllers\CartController::class, 'index'])->name('cart');
Route::post('/cart', [\App\Http\Controllers\CartController::class, 'store'])->name('cart.store');
Route::post('/cart/destroy/{id}', [\App\Http\Controllers\CartController::class, 'destroy'])->name('cart.destroy');
Route::get('/checkout', [\App\Http\Controllers\CartController::class, 'checkout'])->name('cart.checkout');

Route::get('/perfil', [\App\Http\Controllers\PerfilController::class, 'index'])->name('perfil')->middleware('auth');