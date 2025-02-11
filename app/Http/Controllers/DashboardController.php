<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use App\Models\Habit;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'habits' => Habit::all(),
            'goals' => Goal::all(),
        ]);
    }
}
