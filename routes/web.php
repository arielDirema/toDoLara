<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// Page d'accueil (liste des tâches)
Route::get('/', [TaskController::class, 'index'])->name('tasks.index');

// Routes pour la gestion des tâches
Route::resource('tasks', TaskController::class);
