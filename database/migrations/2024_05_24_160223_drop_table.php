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
        Schema::dropIfExists('products');
        Schema::dropIfExists('variant_options');
        Schema::dropIfExists('variants');

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
