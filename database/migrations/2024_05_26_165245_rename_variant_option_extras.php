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
        Schema::rename('variant_option_extras','variant_option_extra');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
