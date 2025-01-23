<?php

namespace App\Http\Controllers;

use App\Models\Goal;

class GoalController extends Controller
{
    public function index()
    {
        $categories = auth()->user()->getCategories();
        $currentCategorySlug = request('category', 'all');

        $goals = $currentCategorySlug === 'all'
            ? Goal::with('milestones')->get()
            : Goal::with('milestones')->where('category', $categories[$currentCategorySlug])->get();

        return view('goals.index', [
            'goals' => $goals,
            'categories' => $categories,
            'currentCategory' => $currentCategorySlug,
        ]);
    }

    public function create()
    {
        $categories = auth()->user()->getCategories();
        $selectedCategorySlug = request('category', 'social');
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
            'category' => 'required|in:social,career-finance,health-fitness,family,hobbies,personal-development,other',
            'title' => 'required|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'notes' => 'nullable|max:1000',
        ]);

        $goal = auth()->user()->goals()->create($validated);

        $categorySlug = array_search($goal->category, $categories);

        return redirect()->route('goals.index', [
            'categorySlug' => $categorySlug
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
            'title' => 'required|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'notes' => 'nullable|max:1000',
        ]);

        $goal->update($validated);

        return redirect('/goals');
    }
}
