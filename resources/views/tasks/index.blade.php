@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Liste des Tâches</h1>

    @foreach($tasks as $task)
        <div class="bg-white shadow rounded-lg p-6 mb-4 dark:bg-gray-800">
            <!-- Titre de la tâche -->
            <h2 class="text-xl font-bold text-gray-900 dark:text-white">{{ $task->title }}</h2>

            <!-- Description de la tâche -->
            <p class="mt-2 text-gray-600 dark:text-gray-300">
                {{ $task->description ?? 'Aucune description' }}
            </p>

            <!-- Date d'échéance -->
            <div class="mt-4 flex items-center text-gray-700 dark:text-gray-400">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <span>Date d'échéance : {{ $task->due_date ? $task->due_date : 'Aucune date' }}</span>
            </div>

            <!-- Case à cocher pour marquer la tâche comme complète -->
            <div class="flex items-center mb-4">
                <input type="checkbox" id="completed" class="w-5 h-5 text-blue-600 rounded focus:ring-blue-500">
                <label for="completed" class="ml-2 text-gray-700">Marquer comme complète</label>
            </div>

            <!-- Boutons d'action -->
            <div class="mt-6 flex space-x-4">
                <!-- Bouton Modifier
                 // route('tasks.edit', $task) }}-->
                <a href="#" class="flex items-center justify-center px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:bg-blue-600 dark:hover:bg-blue-700">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                    </svg>
                    Modifier
                </a>

                <!-- Bouton Supprimer
                // route('tasks.destroy', $task) }}-->
                <form action="#" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="flex items-center justify-center px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:bg-red-600 dark:hover:bg-red-700" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette tâche ?')">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                        Supprimer
                    </button>
                </form>
            </div>
        </div>
    @endforeach
@endsection
