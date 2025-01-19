@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Liste des Tâches</h1>
    <a href="{{ route('tasks.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-4 inline-block">Ajouter une Tâche</a>
    <ul class="space-y-4">
        @foreach ($tasks as $task)
            <li class="bg-white p-4 rounded shadow">
                <strong class="text-lg">{{ $task->title }}</strong>
                <p class="text-gray-700">{{ $task->description }}</p>
                <p class="text-gray-600">Date d'échéance : {{ $task->due_date }}</p>
                <p class="text-gray-600">Statut : {{ $task->completed ? 'Terminée' : 'En cours' }}</p>
                <div class="mt-2 space-x-2">
                    <a href="{{ route('tasks.edit', $task) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Modifier</a>
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Supprimer</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
@endsection
