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
        Schema::create('sizes', function(Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->timestamps();

            $table->foreignId('product_id')->constrained('products');
        });

        Schema::create('colors', function(Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('color', 50);
            $table->timestamps();

            $table->foreignId('product_id')->constrained('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slugs');
    }
};
