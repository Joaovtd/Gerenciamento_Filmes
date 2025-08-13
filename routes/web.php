<?php
use App\Http\Controllers\MovieController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('/', fn() => redirect()->route('movie.index'));
Route::get('/movie/search', [MovieController::class, 'search'])->name('movie.search');
Route::get('/movie', [MovieController::class, 'index'])->name('movie.index');
Route::get('/movie/{movie}', [MovieController::class, 'show'])->name('movie.show');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/movies', [MovieController::class, 'adminIndex'])->name('admin.index');
    Route::get('admin/movies/create', [MovieController::class, 'adminCreate'])->name('admin.create');
    Route::post('admin/movies/store', [MovieController::class, 'store'])->name('admin.store'); // ou adminStore
    Route::get('admin/movies/{movie}/edit', [MovieController::class, 'adminEdit'])->name('admin.edit');
    Route::put('admin/movies/update', [MovieController::class, 'adminUpdate'])->name('admin.update');
    Route::delete('admin/movies/{movie}', [MovieController::class, 'adminDestroy'])->name('admin.destroy');
});
