<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'check-age'])->group(function () {
    Route::resource('books', BookController::class);
    Route::put('/books/{book}/update-tags', [BookController::class, 'updateTags'])->name('books.updateTags');
});


// Route::get('books', [BookController::class, 'index'])->name('books.index');
// Route::get('books/create', [BookController::class, 'create'])->name('books.create');
// Route::post('books', [BookController::class, 'store'])->name('books.store');
// Route::get('books/{book}', [BookController::class, 'show'])->name('books.show');
// Route::get('books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
// Route::put('books/{book}', [BookController::class, 'update'])->name('books.update');
// Route::delete('books/{book}', [BookController::class, 'destroy'])->name('books.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
