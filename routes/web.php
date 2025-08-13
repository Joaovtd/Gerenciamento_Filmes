<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('movie.index'));

Route::get('/movie/search', [MovieController::class, 'search'])->name('movie.search');
Route::resource('movie', MovieController::class);