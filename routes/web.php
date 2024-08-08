<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttractionController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/attractions', [AttractionController::class, 'index']);
    Route::get('/attractions/{attractionId}/comments', [AttractionController::class, 'cantidadComentarios']);
    Route::get('/species/{speciesId}/attractions', [AttractionController::class, 'atraccionesPorEspecie']);
    Route::get('/species/{speciesId}/calificacion', [AttractionController::class, 'calificacionPromedioPorEspecie']);
    Route::get('/comments/{min}/{max}', [CommentController::class, 'comentariosConCalificacion']);
});
require __DIR__ . '/auth.php';
