<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PustakaController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowedController;
use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UlasanController;
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



    Route::middleware('checkRole:admin')->group(function () {
        Route::resource('/user-akun', UserController::class);
        Route::get('/delete-user/{id}', [AuthController::class, 'userDestroy'])->name('user.destroy');

        Route::resource('/ulasan', UlasanController::class);
        //export
        Route::get('/export-category-book', [CategoryBookController::class, 'exportCategoryBook']);
        Route::get('/export-book', [BookController::class, 'exportBook']);
        Route::get('/export-borrowed', [BorrowedController::class, 'exportBorrowed'])->name('export-borrowed');
        Route::get('/export-user', [UserController::class, 'exportUser'])->name('export-user');
    });


    Route::middleware('checkRole:user,admin,petugas')->group(function () {
        Route::resource('/category-book', CategoryBookController::class);
        Route::resource('/book', BookController::class);
        Route::get('/books', [BookController::class, 'showBook'])->name('show.books');
        Route::get('/book/detail/{slug}', [BookController::class, 'detailBook'])->name('borrowed.detail-book');

        // borrow book 
        Route::get('/peminjaman', [BorrowedController::class, 'index'])->name('peminjaman.index');
        Route::patch('/peminjaman/{slug}', [BorrowedController::class, 'borrowBook'])->name('borrow.book');

        //return book
        Route::patch('/return/{id}', [BorrowedController::class, 'returnBook'])->name('return.book');

        //koleksi book
        Route::get('/collection', [KoleksiController::class, 'index'])->name('collection.index');
        Route::delete('/koleksi-hapus/{id}', [KoleksiController::class, 'destroy'])->name('koleksiHapus');
        Route::post('/add-collection', [KoleksiController::class, 'store'])->name('koleksi-book.store');

        //
        Route::get('/ulasan', [UlasanController::class, 'index'])->name('ulasan.index');
        Route::post('/add-ulasan/{id}', [UlasanController::class, 'store'])->name('ulasan.store');

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
