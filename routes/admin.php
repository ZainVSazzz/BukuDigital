<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'admin.dashboard')->name('dashboard');
Route::get('/users', [UserController::class, 'index'])->name('user');

Route::get('/books', [BookController::class, 'index'])->name('book');
Route::get('/books/create', [BookController::class, 'create'])->name('book.create');
Route::post('/books', [BookController::class, 'store']);
Route::get('/books/{book:slug}___{randomStr}/file', [BookController::class, 'file'])->name('book.file');
Route::get('/books/{book:slug}/edit', [BookController::class, 'edit'])->name('book.edit');
Route::put('/books/{book:slug}', [BookController::class, 'update'])->name('book.update');
Route::delete('/books/{book:slug}', [BookController::class, 'destroy'])->name('book.delete');

Route::get('/articles', [ArticleController::class, 'index'])->name('article');
Route::get('/articles/create', [ArticleController::class, 'create'])->name('article.create');
Route::post('/articles', [ArticleController::class, 'store']);
Route::get('/articles/{article:slug}/edit', [ArticleController::class, 'edit'])->name('article.edit');
Route::put('/articles/{article:slug}', [ArticleController::class, 'update'])->name('article.update');
Route::delete('/articles/{article:slug}', [ArticleController::class, 'destroy'])->name('article.delete');

Route::get('/orders', [OrderController::class, 'index'])->name('order');
Route::get('/orders/{order:invoice}', [OrderController::class, 'show'])->name('order.show');
Route::post('/orders/{order:invoice}/confirm', [OrderController::class, 'confirmPayment'])->name('order.confirm');
