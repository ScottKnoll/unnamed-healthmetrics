<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use App\Models\Milestone;

class GoalMilestoneController extends Controller
{
    public function create(Goal $goal)
    {
        return view('goals.milestones.create', [
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

        Milestone::create($validated);

        return redirect('/goals/' . $goal->id);
    }

    public function edit(Goal $goal, Milestone $milestone)
    {
        return view('goals.milestones.edit', [
            'goal' => $goal,
            'milestone' => $milestone,
        ]);
    }

    public function update(Goal $goal, Milestone $milestone)
    {
        $validated = request()->validate([
            'title' => 'required|max:255',
            'target_date' => 'nullable|date',
            'description' => 'nullable|max:255',
            'is_completed' => 'nullable|boolean',
        ]);

        $milestone->update($validated);

        return redirect('/goals/' . $goal->id);
    }

    public function destroy(Goal $goal, Milestone $milestone)
    {
        $milestone->delete();

        return redirect('/goals/' . $goal->id);
    }
}
