<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\CustomAuthenticatedSessionController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::post('/login', 'App\Http\Controllers\CustomAuthenticatedSessionController@store')->name('login');

Route::get('/movies', [App\Http\Controllers\MovieController::class, 'index'])->name('users.index');

Route::middleware(['auth'])->group(function(){
    Route::get('/movies/favorites', [FavoriteController::class, 'favoriteMovies'])->name('users.favorite');
    Route::post('/favorites/add',[FavoriteController::class,'add'])->name('favorites.add');
    Route::post('/favorites/remove',[FavoriteController::class,'remove'])->name('favorite.remove');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/movie', [AdminController::class, 'manageMovies'])->name('admin.movies.manageMovies');
    Route::get('/admin/users', [AdminController::class, 'index'])->name('admin.users.index');
    Route::post('/admin/users/{user}/changeStatus', [AdminController::class, 'changeStatus'])->name('admin.users.changeStatus');
    Route::delete('/admin/users/{user}', [AdminController::class, 'destroy'])->name('admin.users.destroy');
});


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/genres', [GenreController::class, 'index'])->name('admin.genres.index');
    Route::get('/admin/genres/create', [GenreController::class, 'create'])->name('admin.genres.create');
    Route::post('/admin/genres', [GenreController::class, 'store'])->name('admin.genres.store');
    Route::delete('/admin/genres/{genre}', [GenreController::class, 'destroy'])->name('admin.genres.destroy');
});


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/actors', [ActorController::class, 'index'])->name('admin.actors.index');
    Route::get('/admin/actors/create', [ActorController::class, 'create'])->name('admin.actors.create');
    Route::post('/admin/actors', [ActorController::class, 'store'])->name('admin.actors.store');
    Route::delete('/admin/actors/{actor}', [ActorController::class, 'destroy'])->name('admin.actors.destroy');
});
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/directors', [DirectorController::class, 'index'])->name('admin.directors.index');
    Route::get('/admin/directors/create', [DirectorController::class, 'create'])->name('admin.directors.create');
    Route::post('/admin/directors', [DirectorController::class, 'store'])->name('admin.directors.store');
    Route::delete('/admin/directors/{director}', [DirectorController::class, 'destroy'])->name('admin.directors.destroy');
});
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/movies', [MovieController::class, 'adminIndex'])->name('admin.movies.index');
    Route::get('/admin/movies/create', [MovieController::class, 'create'])->name('admin.movies.create');
    Route::post('/admin/movies', [MovieController::class, 'store'])->name('admin.movies.store');
    Route::delete('/admin/movies/{movie}', [MovieController::class, 'destroy'])->name('admin.movies.destroy');
});
