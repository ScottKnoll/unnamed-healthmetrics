<?php

use App\Http\Controllers\GoalController;
use App\Http\Controllers\GoalMilestoneController;
use App\Http\Controllers\HabitController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('habits', HabitController::class)->except('destroy');
    Route::resource('tasks', TaskController::class);
    Route::resource('goals', GoalController::class)->except('destroy');
    Route::resource('goals.milestones', GoalMilestoneController::class)->except('index', 'show');
    Route::resource('milestones.tasks', TaskController::class)->except(['index', 'show']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
