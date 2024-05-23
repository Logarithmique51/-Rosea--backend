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
        Schema::table('users', function (Blueprint $table) {
            $table->removeColumn('name');
            $table->text('first_name');
            $table->text('last_name');
            $table->timestamp('birthdate');
            $table->boolean('gender');
            $table->unsignedInteger('phone')->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->text('name');
            $table->removeColumn('first_name');
            $table->removeColumn('last_name');
            $table->removeColumn('birthdate');
            $table->removeColumn('gender');
            $table->removeColumn('phone');
        });
    }
};
