<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// Page d'accueil (liste des tâches)
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');

Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

Route::get('/tasks/{id}', [TaskController::class, 'show'])->name('tasks.show');

Route::patch('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');

Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');

// Routes pour la gestion des tâches
//Route::resource('tasks', TaskController::class);
