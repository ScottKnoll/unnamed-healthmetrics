<?php

namespace App\Http\Controllers;

use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store()
    {
        $validated = request()->validate([
            'name' => 'required',
            'description' => 'required',
            'target_date' => 'nullable',
        ]);

        Task::create($validated);

        return redirect('/tasks');
    }
}
