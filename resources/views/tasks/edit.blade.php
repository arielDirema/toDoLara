@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Modifier la Tâche</h1>

    <form action="{{ route('tasks.update', $task) }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block text-gray-700">Titre</label>
            <input type="text" name="title" id="title" value="{{ $task->title }}" class="w-full px-4 py-2 border rounded focus:outline-none focus:border-blue-500" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700">Description</label>
            <textarea name="description" id="description" class="w-full px-4 py-2 border rounded focus:outline-none focus:border-blue-500">{{ $task->description }}</textarea>
        </div>

        <div class="mb-4">
            <label for="due_date" class="block text-gray-700">Date d'échéance</label>
            <input type="date" name="due_date" id="due_date" value="{{ $task->due_date }}" class="w-full px-4 py-2 border rounded focus:outline-none focus:border-blue-500">
        </div>

        <div class="mb-4">
            <label for="completed" class="block text-gray-700">Statut</label>
            <select name="completed" id="completed" class="w-full px-4 py-2 border rounded focus:outline-none focus:border-blue-500">
                <option value="0" {{ $task->completed ? '' : 'selected' }}>En cours</option>
                <option value="1" {{ $task->completed ? 'selected' : '' }}>Terminée</option>
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Mettre à jour</button>
    </form>
@endsection
