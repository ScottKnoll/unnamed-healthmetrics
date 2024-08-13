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
            'name' => 'required',
            'description' => 'required',
            'target_date' => 'nullable',
        ]);

        Goal::create($validated);

        return redirect('/goals');
    }
}
