<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/catalog', [App\Http\Controllers\CatalogController::class, 'index']);
Route::get('/publisher', [App\Http\Controllers\PublisherController::class, 'index']);
Route::get('/author', [App\Http\Controllers\AuthorController::class, 'index']);
Route::get('/book', [App\Http\Controllers\BookController::class, 'index']);
Route::get('/member', [App\Http\Controllers\MemberController::class, 'index']);