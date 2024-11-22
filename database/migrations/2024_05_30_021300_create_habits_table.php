<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('habits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('notes')->nullable();
            $table->enum('frequency', ['daily', 'weekly', 'monthly'])->default('daily');
            $table->enum('difficulty', ['trivial', 'easy', 'medium', 'hard'])->default('trivial');
            $table->integer('current_streak')->default(0);
            $table->integer('max_streak')->default(0);
            $table->timestamp('last_completed_at')->nullable();
            $table->timestamps();
        });

        Schema::create('habit_completions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('habit_id')->constrained()->onDelete('cascade');
            $table->date('completed_on');
            $table->timestamps();

            $table->unique(['habit_id', 'completed_on']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('habits');
    }
};
