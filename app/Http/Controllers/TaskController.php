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
        $tasks = Task::all();
        //return view('tasks.index', compact('tasks'));
        return json_encode([
            'status' => 'success',
            'info' => '',
            'response' => $tasks
        ]);
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

        Task::create($validatedData);
        //return redirect()->route('tasks.index');
        return json_encode([
            'status' => 'success',
            'info' => 'Task created successfully',
            'response' => $request->all()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        //return view('tasks.show', compact('task'));

        $task = Task::find($id);

        if (is_null($task)) {
            return json_encode([
                'status' => 'failed',
                'info' => 'Task not found',
                'response' => ''
            ]);
        }

        return json_encode([
            'status' => 'success',
            'info' => '',
            'response' => $task
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
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
            return json_encode([
                'status' => 'failed',
                'info' => 'Task not found',
                'response' => ''
            ]);
        }

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'due_date' => 'nullable|date',
        ]);

        $task->update($validatedData);
        //return redirect()->route('tasks.index');

        return json_encode([
            'status' => 'success',
            'info' => 'Task updated successfully',
            'response' => $request->all()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $task = Task::find($id);

        if (is_null($task)) {
            return json_encode([
                'status' => 'failed',
                'info' => 'Task not found',
                'response' => ''
            ]);
        }

        $task->delete();
        //return redirect()->route('tasks.index');

        return json_encode([
            'status' => 'success',
            'info' => 'Task deleted successfully',
            'response' => ''
        ]);
    }
}
