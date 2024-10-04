<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use App\Models\Milestone;

class GoalMilestoneController extends Controller
{
    public function create(Goal $goal)
    {
        return view('goal.milestones.create', [
            'goal' => $goal
        ]);
    }

    public function store(Goal $goal)
    {
        $validated = request()->validate([
            'title' => 'required|max:255',
            'target_date' => 'nullable|date',
            'description' => 'nullable|max:255',
            'is_completed' => 'nullable|boolean',
        ]);

        $validated['goal_id'] = $goal->id;

        $milestone = Milestone::create($validated);

        return redirect('/goals/' . $goal->id . '/milestones/' . $milestone->id);
    }

    public function show(Goal $goal, Milestone $milestone)
    {
        return view('milestones.show', [
            'goal' => $goal,
            'milestone' => $milestone
        ]);
    }
}
