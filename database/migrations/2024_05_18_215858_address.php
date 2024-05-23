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
        Schema::create('addresses', function (Blueprint $table) {
            $table->foreignId('id')->primary();
            $table->text('number');
            $table->text('street');
            $table->text('postcode');
            $table->text('name');
            $table->text('city');
            $table->text('label');
            /*1*/
            $table->float('latitude');
            /*0*/
            $table->float('longitude');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
