<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('target_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('target_parameter_id')->constrained()->onDelete('cascade');
            $table->date('log_date');
            $table->integer('completed_value')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('target_logs');
    }
};
