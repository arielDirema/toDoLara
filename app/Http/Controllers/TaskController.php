<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::orderBy('created_at', 'desc')->get();

        return view('tasks.index', compact('tasks'));
    }

    public function completed()
    {
        // Filtre les tâches complétées
        $tasks = Task::where('completed', true)->get();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'due_date' => 'nullable|date',
        ]);

        $task = Task::create($validatedData);

        return redirect()->route('tasks.index')->with('status', 'Task created!');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        //return view('tasks.show', compact('task'));

        /*$task = Task::find($id);

        if (is_null($task)) {
            return view('errors.404');
        }

        return response()->json(
            [
                'status' => 'success',
                'message' => '',
                'response' => $task
            ],
            200
        );*/
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $task = Task::find($id);

        if (is_null($task)) {
            return view('errors.404');
        }

        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $task = Task::find($id);

        if (is_null($task)) {
            return view('errors.404');
        }

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'due_date' => 'nullable|date',
        ]);

        $task->update($validatedData);
        //return redirect()->route('tasks.index');

        return response()->json(
            [
                'status' => 'success',
                'message' => 'Task updated successfully',
                'response' => $task
            ],
            201
        );
    }

    public function updatecompleted(Request $request, $id)
    {
        $task = Task::find($id);

        if (is_null($task)) {
            return view('errors.404');
        }

        // Valide les données de la requête
        $validatedData = $request->validate([
            'completed' => 'required|boolean',
        ]);

        // Met à jour la tâche
        $task->update($validatedData);

        return response()->json(
            [
                'status' => 'success',
                'message' => 'Task updated successfully',
                'response' => $task
            ],
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $task = Task::find($id);

        if (is_null($task)) {
            return view('errors.404');
        }

        $task->delete();

        return redirect()->route('tasks.index')->with('status', 'Task deleted!');
    }
}
