<?php

use App\Http\Controllers\API\AdvertController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Http\Controllers\API\BookController;
use App\Http\Controllers\API\VinylController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\API\AdvertVinylController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
    });

    // Accessible à tous
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');
Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');
Route::post('/books', [BookController::class, 'store'])->name('books.store');
Route::delete('/books/{books}', [BookController::class, 'destroy'])->name('books.destroy');
Route::post('/books/search', [BookController::class, 'search'])->name('books.search');

Route::get('/vinyls', [VinylController::class, 'index'])->name('vinyls.index');
Route::get('/vinyls/{vinyl}', [VinylController::class, 'show'])->name('vinyls.show');
Route::put('/vinyls/{vinyl}', [VinylController::class, 'update'])->name('vinyls.update');
Route::post('/vinyls', [VinylController::class, 'store'])->name('vinyls.store');
Route::delete('/vinyls/{vinyls}', [VinylController::class, 'destroy'])->name('vinyls.destroy');

Route::get('/adverts', [AdvertController::class, 'index'])->name('adverts.index');
Route::get('/adverts/{advert}', [AdvertController::class, 'show'])->name('adverts.show');
Route::put('/adverts/{advert}', [AdvertController::class, 'update'])->name('adverts.update');
Route::post('/adverts', [AdvertController::class, 'store'])->name('adverts.store');
Route::delete('/adverts/{adverts}', [AdvertController::class, 'destroy'])->name('adverts.destroy');
Route::post('/adverts/search', [AdvertController::class, 'search'])->name('adverts.search');

Route::get('/adverts-vinyls', [AdvertVinylController::class, 'index'])->name('adverts.index');
Route::get('/adverts-vinyls/{advertVinyl}', [AdvertVinylController::class, 'show'])->name('adverts.show');
Route::put('/adverts-vinyls/{advertVinyl}', [AdvertVinylController::class, 'update'])->name('adverts.update');
Route::post('/adverts-vinyls', [AdvertVinylController::class, 'store'])->name('adverts.store');
Route::delete('/adverts-vinyls/{advertVinyls}', [AdvertVinylController::class, 'destroy'])->name('adverts.destroy');
Route::post('/adverts-vinyls/search', [AdvertVinylController::class, 'search'])->name('adverts.search');

//Seulement accessible via le JWT
Route::middleware('auth:api')->group(function() {
Route::get('/currentuser', [UserController::class, 'currentUser']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/users', [AuthController::class, 'index'])->name('users.index');
Route::get('/users{user}', [AuthController::class, 'show'])->name('users.show');

});




