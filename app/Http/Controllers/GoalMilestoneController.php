<?php

namespace App\Http\Controllers;

use App\Models\Goal;

class GoalMilestoneController extends Controller
{
    public function create(Goal $goal)
    {
        return view('/milestones', [
            'goal' => $goal
        ]);
    }
}
