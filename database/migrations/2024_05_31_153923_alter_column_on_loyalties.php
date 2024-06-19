<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Disable foreign key constraints
        Schema::dropIfExists('loyalties');
        Schema::create('loyalties',function (Blueprint $table){
            $table->uuid('id')->primary();
            $table->integer('balance')->default(0);
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};
