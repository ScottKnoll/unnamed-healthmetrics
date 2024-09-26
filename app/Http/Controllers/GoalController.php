<?php

namespace App\Http\Controllers;

use App\Models\Goal;

class GoalController extends Controller
{
    public function index()
    {
        $categories = auth()->user()->getCategories();
        $currentCategory = request()->query('category');

        $goals = Goal::where('category', $currentCategory)->get();

        return view('goals.index', [
            'goals' => $goals,
            'categories' => $categories,
            'currentCategory' => $currentCategory,
        ]);
    }

    public function create()
    {
        $categories = auth()->user()->getCategories();
        $selectedCategory = request()->query('category', 'social');

        return view('goals.create', [
            'categories' => $categories,
            'selectedCategory' => $selectedCategory,
        ]);
    }

    public function store()
    {
        $validated = request()->validate([
            'category' => 'required',
            'title' => 'required|max:255',
            'goal_start' => 'nullable|date',
            'goal_end' => 'nullable|date',
            'smart_goals' => 'required|array',
            'smart_goals.specific' => 'nullable',
            'smart_goals.measurable' => 'nullable',
            'smart_goals.achievable' => 'nullable',
            'smart_goals.relevant' => 'nullable',
            'smart_goals.time-based' => 'nullable',
        ]);

        $goal = auth()->user()->goals()->create($validated);

        return redirect()->route('goals.index', [
            'category' => $goal->category
        ]);
    }

    public function show(Goal $goal)
    {
        return view('goals.show', [
            'goal' => $goal,
        ]);
    }

    public function edit(Goal $goal)
    {
        return view('goals.edit', [
            'goal' => $goal,
            'category' => $goal->category,
        ]);
    }

    public function update(Goal $goal)
    {
        $validated = request()->validate([
            'category' => 'required|in:social,career,physical,family,leisure,personality,other',
            'goal' => 'required|max:255',
            'smart_goals' => 'required|array',
            'smart_goals.specific' => 'nullable',
            'smart_goals.measurable' => 'nullable',
            'smart_goals.achievable' => 'nullable',
            'smart_goals.relevant' => 'nullable',
            'smart_goals.time-based' => 'nullable',
        ]);

        $goal->update($validated);

        return redirect('/goals');
    }
}
