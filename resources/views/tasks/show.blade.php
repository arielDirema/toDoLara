@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Détails de la Tâche</h1>

    <div class="bg-white p-6 rounded shadow">
        <div class="mb-4">
            <strong class="text-gray-700">Titre :</strong>
            <p class="text-lg">{{ $task->title }}</p>
        </div>

        <div class="mb-4">
            <strong class="text-gray-700">Description :</strong>
            <p class="text-gray-700">{{ $task->description ?? 'Aucune description' }}</p>
        </div>

        <div class="mb-4">
            <strong class="text-gray-700">Date d'échéance :</strong>
            <p class="text-gray-700">{{ $task->due_date ? $task->due_date->format('d/m/Y') : 'Aucune date' }}</p>
        </div>

        <div class="mb-4">
            <strong class="text-gray-700">Statut :</strong>
            <p class="text-gray-700">{{ $task->completed ? 'Terminée' : 'En cours' }}</p>
        </div>

        <div class="flex space-x-2">
            <a href="{{ route('tasks.edit', $task) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Modifier</a>
            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Supprimer</button>
            </form>
            <a href="{{ route('tasks.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Retour à la liste</a>
        </div>
    </div>
@endsection
