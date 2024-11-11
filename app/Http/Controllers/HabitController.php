<?php

namespace App\Http\Controllers;

use App\Models\Habit;

class HabitController extends Controller
{
    public function index()
    {
        return view('habits.index', [
            'habits' => Habit::all()
        ]);
    }

    public function create()
    {
        $goals = auth()->user()->goals;

        return view('habits.create', [
            'goals' => $goals,
        ]);
    }

    public function store()
    {
        $validated = request()->validate([
            'title' => 'required|max:255',
            'notes' => 'nullable',
            'frequency' => 'required|in:daily,weekly,monthly',
            'difficulty' => 'required|in:trivial,easy,medium,hard',
            'goal_ids' => 'nullable|array',
            'goal_ids.*' => 'exists:goals,id',
            'target_count' => 'nullable|integer|min:1',
            'reminder_time' => 'nullable',
            'category' => 'nullable|max:255',
            'target_date' => 'nullable|date',
        ]);

        $habit = Habit::create($validated);

        // add goals logic

        return redirect('/habits/' . $habit->id);
    }

    public function edit()
    {
        $goals = auth()->user()->goals;

        return view('habits.edit', [
            'goals' => $goals,
        ]);
    }

    public function update(Habit $habit)
    {
        $validated = request()->validate([
            'title' => 'required|max:255',
            'notes' => 'nullable',
            'frequency' => 'required|in:daily,weekly,monthly',
            'difficulty' => 'required|in:trivial,easy,medium,hard',
            'goal_ids' => 'nullable|array',
            'goal_ids.*' => 'exists:goals,id',
            'target_count' => 'nullable|integer|min:1',
            'reminder_time' => 'nullable',
            'category' => 'nullable|max:255',
            'target_date' => 'nullable|date',
        ]);

        $habit->update($validated);

        // add goals detaching

        return redirect('/habits/' . $habit->id);
    }
}
