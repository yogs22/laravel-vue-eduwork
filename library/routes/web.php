<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('test_spatie', [App\Http\Controllers\HomeController::class, 'test_spatie']);
// Route::get('/books', [App\Http\Controllers\BookController::class, 'index'])->name('book.index');
// Route::get('/members', [App\Http\Controllers\MemberController::class, 'index'])->name('member.index');

Route::resources(['home' => App\Http\Controllers\HomeController::class]);
Route::resources(['catalog' => App\Http\Controllers\CatalogController::class]);
Route::resources(['publisher' => App\Http\Controllers\PublisherController::class]);
Route::resources(['author' => App\Http\Controllers\AuthorController::class]);
Route::resources(['member' => App\Http\Controllers\MemberController::class]);
Route::resources(['book' => App\Http\Controllers\BookController::class]);
Route::resources(['transaction' => App\Http\Controllers\TransactionController::class]);


Route::get('/api/home', [App\Http\Controllers\HomeController::class, 'api'])->name('api.home');
Route::get('/api/authors', [App\Http\Controllers\AuthorController::class, 'api'])->name('api.author');
Route::get('/api/publishers', [App\Http\Controllers\PublisherController::class, 'api'])->name('api.publisher');
Route::get('/api/members', [App\Http\Controllers\MemberController::class, 'api'])->name('api.member');
Route::get('/api/books', [App\Http\Controllers\BookController::class, 'api'])->name('api.book');
Route::get('/api/transactions', [App\Http\Controllers\TransactionController::class, 'api'])->name('api.transaction');



// /* ROUTE CATALOG */
// Route::get('/catalogs', [App\Http\Controllers\CatalogController::class, 'index'])->name('catalog.index');
// Route::get('/create_new_catalog', [App\Http\Controllers\CatalogController::class, 'create'])->name('catalog.created');
// Route::post('/catalogs', [App\Http\Controllers\CatalogController::class, 'store']);
// Route::get('/catalogs/{catalog}/edit', [App\Http\Controllers\CatalogController::class, 'edit'])->name('catalog.edit');
// Route::put('/catalogs/{catalog}', [App\Http\Controllers\CatalogController::class, 'update']);
// Route::delete('/catalogs/{catalog}', [App\Http\Controllers\CatalogController::class, 'destroy']);

// /* ROUTE PUBLISHER */
// Route::get('/publishers', [App\Http\Controllers\PublisherController::class, 'index'])->name('publisher.index');
// Route::get('/create_new_publisher', [App\Http\Controllers\PublisherController::class, 'create'])->name('publisher.created');
// Route::post('/publishers', [App\Http\Controllers\PublisherController::class, 'store']);
// Route::get('/publishers/{publisher}/edit', [App\Http\Controllers\PublisherController::class, 'edit'])->name('publisher.edit');
// Route::put('/publishers/{publisher}', [App\Http\Controllers\PublisherController::class, 'update']);
// Route::delete('/publishers/{publisher}', [App\Http\Controllers\PublisherController::class, 'destroy']);

// route yang di ambil adalah name dari route tersebut.
// dan untuk memanggill urlnya : url