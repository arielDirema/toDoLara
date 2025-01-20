@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-between mb-10">
        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-6 py-3.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            <a href="{{ route('tasks.create') }}" class="hover:underline">
                Ajouter une Tâche
            </a>
        </button>

        <form class="w-2/4">
            <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="search" id="search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" required />
                <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div>
        </form>
    </div>

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
                <input type="checkbox"
                       id="completed-{{ $task->id }}"
                       class="w-5 h-5 text-blue-600 rounded focus:ring-blue-500"
                       data-task-id="{{ $task->id }}"
                       onchange="toggleTaskCompletion(this)"
                        {{ $task->completed ? 'checked' : '' }}>
                <label for="completed" class="ml-2 text-gray-700">Marquer comme complète</label>
            </div>

            <!-- Boutons d'action -->
            <div class="mt-6 flex space-x-4">
                <!-- Bouton Modifier
                 //  }}-->
                <a href="{{ route('tasks.edit', $task->id) }}" class="flex items-center justify-center px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:bg-blue-600 dark:hover:bg-blue-700">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                    </svg>
                    Modifier
                </a>

                <!-- Bouton Supprimer
                // route('tasks.destroy', $task) }}-->
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline">
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
