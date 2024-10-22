<?php

namespace App\Http\Controllers;

use App\Models\Milestone;
use App\Models\Task;

class TaskController extends Controller
{
    public function create(Milestone $milestone)
    {
        return view('tasks.create', [
            'milestone' => $milestone,
        ]);
    }

    public function store(Milestone $milestone)
    {
        $validated = request()->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|max:255',
            'target_date' => 'nullable|date',
            'is_completed' => 'nullable|boolean',
        ]);

        $milestone->tasks()->create($validated);

        return redirect()->route('goals.show', $milestone->goal_id);
    }

    public function edit(Milestone $milestone, Task $task)
    {
        return view('tasks.edit', compact('milestone', 'task'));
    }

    public function update(Milestone $milestone, Task $task)
    {
        $validated = request()->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|max:255',
            'target_date' => 'nullable|date',
            'is_completed' => 'nullable|boolean',
        ]);

        $task->update($validated);

        return redirect()->route('goals.show', $milestone->goal_id);
    }

    public function destroy(Milestone $milestone, Task $task)
    {
        $task->delete();

        return redirect()->route('goals.show', $milestone->goal_id);
    }
}
