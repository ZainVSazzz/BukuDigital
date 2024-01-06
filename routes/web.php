<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyBookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/privasi', 'privasi')->name('privasi');

Route::get('/buku', [BookController::class, 'index'])->name('book');
Route::get('/buku/query', [BookController::class, 'query'])->name('book.query');
Route::get('/buku/{book:slug}', [BookController::class, 'show'])->name('book.detail');

Route::get('/berita', [ArticleController::class, 'index'])->name('article');
Route::get('/berita/{article:slug}', [ArticleController::class, 'show'])->name('article.show');

Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::get('/cart/add/{book:slug}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart/remove/{book:slug}', [CartController::class, 'remove'])->name('cart.remove');

//    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/user', [DashboardController::class, 'user'])->name('dashboard.user');

    Route::get('/kelola/buku-saya', [MyBookController::class, 'index'])->name('my-book');
    Route::get('/kelola/buku-saya/{id}___{randomStr}/file', [MyBookController::class, 'file'])->name('my-book.file');
    Route::get('/kelola/buku-saya/{id}/view', [MyBookController::class, 'view'])->name('my-book.view');

    Route::get('/kelola/transaksi', [TransactionController::class, 'index'])->name('transaction');
    Route::get('/kelola/transaksi/{order:invoice}', [TransactionController::class, 'detail'])->name('transaction.detail');
    Route::post('/kelola/transaksi/{order:invoice}', [TransactionController::class, 'payment']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update']);
});

Route::middleware('admin')
    ->prefix('admin')
    ->name('admin.')->group(function () {
        require __DIR__ . '/admin.php';
    });

require __DIR__ . '/auth.php';
