<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionDetailController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::resource('catalogs', CatalogController::class);
Route::resource('publishers', PublisherController::class);
Route::resource('authors', AuthorController::class);
Route::resource('books', BookController::class);
Route::resource('members', MemberController::class);
Route::resource('transactions', TransactionController::class);

Route::get('api/authors', [AuthorController::class, 'api']);
Route::get('api/publishers', [PublisherController::class, 'api']);
Route::get('api/members', [MemberController::class, 'api']);
Route::get('api/books', [BookController::class, 'api']);
Route::get('api/transactions', [TransactionController::class, 'api']);

Route::get('test_spatie', [TransactionController::class, 'test_spatie']);