<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;

use App\Http\Controllers\DashboardController;

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

// Route::get('/', function () {
//     return view('welcome');
// })->middleware('auth');
Route::middleware('only_guest')->group(function () {
   
    // Route::get('/', [AuthController::class, 'login'])->name('login');
    // Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/', [AuthController::class, 'authenticating'])->name('login');
    Route::get('register', [AuthController::class, 'register']);
    Route::post('register', [AuthController::class, 'registerakun']);
});

Route::middleware('auth')->group(function () {
Route::get('logout', [AuthController::class, 'logout']);
Route::get('dashboard', [DashboardController::class, 'index'])->middleware('only_admin')->name('dashboard');
Route::get('profile', [UserController::class, 'profile'])->middleware('only_client');
Route::get('books', [BookController::class, 'index'])->name('buku');
Route::get('create', [BookController::class, 'create'])->name('books.create');
Route::post('store', [BookController::class, 'store'])->name('books.store');
Route::get('category', [CategoryController::class, 'index'])->name('category');
Route::get('createkategori', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::post('/categories/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/delete/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');


Route::get('books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
Route::post('books/{book}', [BookController::class, 'store'])->name('books.update');
Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('destroy');// routes/web.php
Route::get('/books/export/pdf', [BookController::class, 'exportToPDF'])->name('books.export.pdf');
Route::get('/books/export/excel', [BookController::class, 'exportToExcel'])->name('books.export.excel');




});
