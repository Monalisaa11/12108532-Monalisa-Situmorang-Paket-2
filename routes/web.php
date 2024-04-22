<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowedController;
use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryBookController;

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

Route::middleware('isLogin')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'WelcomeDashboard'])->name('dashboard.index');
    Route::resource('/user-akun', UserController::class);

    
    Route::middleware('checkRole:admin')->group(function () {
        Route::resource('/category-book', CategoryBookController::class);
        Route::resource('/book', BookController::class);
     
        Route::get('/delete-user/{id}', [AuthController::class, 'userDestroy'])->name('user.destroy');
    });


    Route::middleware('checkRole:user,admin,petugas')->group(function () {
        Route::get('/books', [BookController::class, "showBook"])->name('books');
        Route::get('/books/download', [BookController::class, "exportBook"])->name('export.book');
        Route::get('/book/detail/{slug}', [BookController::class, 'detailBook'])->name('detail.book');

        // borrow book 
        Route::get('/peminjaman', [BorrowedController::class, 'index'])->name('peminjaman.index');
        Route::patch('/peminjaman/{slug}', [BorrowedController::class, 'borrowBook'])->name('borrow.book');

        Route::patch('/return/{id}', [BorrowedController::class, 'returnBook'])->name('return.book');
        Route::get('/collection', [KoleksiController::class, 'index'])->name('collection.index');
        Route::post('/add-collection', [KoleksiController::class, 'store'])->name('collection.store');
    });

});

Route::middleware(['isGuest'])->group(function () {

    Route::get('/login', [AuthController::class, 'index'])->name('login.index');
    Route::post('/login', [AuthController::class, 'loginStore'])->name('login.store');

    Route::get('/register', [AuthController::class, 'register'])->name('register.index');
    Route::post('/register', [AuthController::class, 'registerStore'])->name('register.store');
});

Route::get('/error', function () {
    return view('pages.error');
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');