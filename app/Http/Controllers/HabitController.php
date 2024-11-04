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
        return view('habits.create');
    }
}
