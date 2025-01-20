@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-6">Modifier la Tâche</h1>

        <!-- Formulaire de mise à jour -->
        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Simule une requête PUT -->

            <!-- Champ Titre -->
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-bold mb-2">Titre</label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title', $task->title) }}"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required
                >
                @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Champ Description -->
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
                <textarea
                    id="description"
                    name="description"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                >{{ old('description', $task->description) }}</textarea>
                @error('description')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Champ Date d'Échéance -->
            <div class="mb-4">
                <label for="due_date" class="block text-gray-700 font-bold mb-2">Date d'Échéance</label>
                <input
                    type="date"
                    id="due_date"
                    name="due_date"
                    value="{{ old('due_date', $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('Y-m-d') : '') }}"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                @error('due_date')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Case à Cocher pour Tâche Complète -->
            <div class="mb-6">
                <label for="completed" class="flex items-center">
                    <input
                        type="checkbox"
                        id="completed"
                        name="completed"
                        class="w-5 h-5 text-blue-600 rounded focus:ring-blue-500"
                        {{ old('completed', $task->completed) ? 'checked' : '' }}
                    >
                    <span class="ml-2 text-gray-700">Marquer comme complète</span>
                </label>
                @error('completed')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Boutons d'Action -->
            <div class="flex space-x-4">
                <button
                    type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-300"
                >
                    Mettre à jour
                </button>
                <a
                    href="{{ route('tasks.index') }}"
                    class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition duration-300"
                >
                    Annuler
                </a>
            </div>
        </form>
    </div>
@endsection
