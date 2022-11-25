<?php

use App\Models\author;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\AuthourControler;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\AutoCompleteController;

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

Route::get('add', function () {
    return view(
        'add_books',
        [
            'authors' => author::all()
        ]
    );
});

// Route::get('index', function () {
//     return view('index');
// });

Route::get('update/{id}', [BooksController::class, 'update'])->name('up');

Route::get('view', function () {
    return view('view_books');
});






















Route::post('/req', [BooksController::class, 'store']);
Route::get('/delete/{id}', [BooksController::class, 'destroy'])->name('delete');
Route::put('/put/{id}', [BooksController::class, 'updateBook'])->name('put');
Route::post('/update_books', [BooksController::class, 'update'])->name('update_books');

Route::get('sortDown', [BooksController::class, 'sortDown']);


//search


Route::get('search', [AutoCompleteController::class, 'index'])->name('search');
Route::get('autocomplete', [AutoCompleteController::class, 'autocomplete'])->name('autocomplete');




// Route::put('/put/{id}', [BooksController::class, 'updatename'])->name('put');
// Route::get('/show', [BooksController::class, 'index']);



Route::get('author/{id}', [AuthourControler::class, 'index']);


// Route::get('a/{id}', [AuthourControler::class, 'index']);

// Route::get('/', [BooksController::class, 'index_auth']);

Route::get('log', [CustomAuthController::class, 'signOut']);