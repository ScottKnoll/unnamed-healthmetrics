<?php

namespace App\Http\Controllers;

use App\Models\Goal;

class GoalController extends Controller
{
    public function index()
    {
        $goals = Goal::all();

        return view('goals.index', [
            'goals' => $goals,
        ]);
    }

    public function create()
    {
        return view('goals.create');
    }

    public function store()
    {
        $validated = request()->validate([
            'five_year_goal' => 'nullable',
            'one_year_goal' => 'nullable',
            'one_month_goal' => 'nullable',
            'smart_goals' => 'required|array',
            'smart_goals.specific' => 'nullable',
            'smart_goals.measurable' => 'nullable',
            'smart_goals.achievable' => 'nullable',
            'smart_goals.relevant' => 'nullable',
            'smart_goals.time-based' => 'nullable',
        ]);

        $validated['user_id'] = auth()->user()->id;

        Goal::create($validated);

        return redirect('/goals');
    }

    public function edit(Goal $goal)
    {
        return view('goals.edit', [
            'goal' => $goal,
        ]);
    }

    public function update(Goal $goal)
    {
        $validated = request()->validate([
            'five_year_goal' => 'nullable',
            'one_year_goal' => 'nullable',
            'one_month_goal' => 'nullable',
            'smart_goals' => 'required|array',
            'smart_goals.specific' => 'nullable',
            'smart_goals.measurable' => 'nullable',
            'smart_goals.achievable' => 'nullable',
            'smart_goals.relevant' => 'nullable',
            'smart_goals.time_based' => 'nullable',
        ]);

        $goal->update($validated);

        return redirect('/goals');
    }
}
