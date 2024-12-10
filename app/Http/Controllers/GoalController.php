<?php

namespace App\Http\Controllers;

use App\Models\Goal;

class GoalController extends Controller
{
    public function index()
    {
        $categories = auth()->user()->getCategories();
        $currentCategorySlug = request()->query('category', 'all');

        if ($currentCategorySlug === 'all') {
            $goals = Goal::with('milestones')->get();
        } else {
            $currentCategoryName = $categories[$currentCategorySlug];
            $goals = Goal::with('milestones')->where('category', $currentCategoryName)->get();
        }

        return view('goals.index', [
            'goals' => $goals,
            'categories' => $categories,
            'currentCategory' => $currentCategorySlug,
        ]);
    }

    public function create()
    {
        $categories = auth()->user()->getCategories();
        $selectedCategorySlug = request()->query('category', 'social');
        $selectedCategory = $categories[$selectedCategorySlug] ?? 'Default Category';

        return view('goals.create', [
            'categories' => $categories,
            'selectedCategory' => $selectedCategory,
            'selectedCategorySlug' => $selectedCategorySlug,
        ]);
    }

    public function store()
    {
        $categories = auth()->user()->getCategories();
        $validated = request()->validate([
            'category' => 'required',
            'title' => 'required|max:255',
            'goal_start' => 'nullable|date',
            'goal_end' => 'nullable|date',
            'smart_goals' => 'nullable|array',
            'smart_goals.specific' => 'nullable',
            'smart_goals.measurable' => 'nullable',
            'smart_goals.achievable' => 'nullable',
            'smart_goals.relevant' => 'nullable',
            'smart_goals.time-based' => 'nullable',
        ]);

        $goal = auth()->user()->goals()->create($validated);

        $categorySlug = array_search($goal->category, $categories);

        return redirect()->route('goals.index', [
            'category' => $categorySlug
        ]);
    }

    public function show(Goal $goal)
    {
        $goal->load('milestones.tasks');

        return view('goals.show', [
            'goal' => $goal,
            'milestones' => $goal->milestones,
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
