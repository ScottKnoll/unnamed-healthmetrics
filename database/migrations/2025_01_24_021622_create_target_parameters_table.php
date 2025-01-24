<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('target_parameters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('goal_id')->constrained()->onDelete('cascade');
            $table->foreignId('target_type_id')->constrained()->onDelete('restrict');
            $table->string('name');
            $table->integer('target_value');
            $table->string('frequency')->default('weekly');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('target_parameters');
    }
};
