<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PlatController;

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

Route::get('/', [AuthController::class, 'home'])->name('home');



Route::get('/register', [AuthController::class, 'getRegisterForm'])->name('registerForm');
Route::post('/register', [AuthController::class, 'create'])->name('register');
Route::get('/login', [AuthController::class, 'getLoginForm'])->name('loginForm');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::get('/categories', [CategoriesController::class, 'getCategories'])->name('categories');


Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/resto/dashboard', [AuthController::class, 'resto'])->name('resto.dashboard')->middleware('resto');
Route::get('/plats', [PlatController::class, 'allPlats'])->name('allPlats')->middleware('resto');
Route::get('/plats/create', [PlatController::class, 'create'])->name('createPlat')->middleware('resto');
Route::post('/plats/post', [PlatController::class, 'store'])->name('addPlat')->middleware('resto');
Route::get('/plats/{id}/edit', [PlatController::class, 'edit'])->name('plats.edit')->middleware('resto');
Route::put('/plats/{id}/update', [PlatController::class, 'update'])->name('updatePlat')->middleware('resto');
Route::delete('/plats/{id}/delete', [PlatController::class, 'destroy'])->name('plats.destroy')->middleware('resto');

Route::get('/commands', [CardController::class, 'getCommands'])->name('getCommands')->middleware('resto');
Route::post('/command/{id}/accept', [CardController::class, 'acceptCommand'])->name('command.accept')->middleware('resto');

Route::get('/user/dashboard', [PlatController::class, 'getPlats'])->name('user.dashboard')->middleware('user');
Route::post('/add/{id}/toCard/', [CardController::class, 'addToCard'])->name('AddToCard')->middleware('user');
Route::get('/cart/plats', [CardController::class, 'cardPlats'])->name('carPlats')->middleware('user');
Route::post('/confirm/order', [OrderController::class, 'confirmOrder'])->name('confirmOrder')->middleware('user');
Route::delete('/cart/delete', [CardController::class, 'delete'])->name('cart.plats.delete')->middleware('user');
Route::get('/count', [CardController::class, 'getOrderCount'])->name('count')->middleware('user');
