<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');

Route::get('/tasks/completed', [TaskController::class, 'completed'])->name('tasks.completed');

Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');

Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');

Route::get('/tasks/{id}', [TaskController::class, 'show'])->name('tasks.show');

Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');

// Route pour mettre à jour une tâche (PATCH)
Route::patch('/tasks/{id}', [TaskController::class, 'updatecompleted'])->name('tasks.updatecompleted');

Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');

// Routes pour la gestion des tâches
//Route::resource('tasks', TaskController::class);
