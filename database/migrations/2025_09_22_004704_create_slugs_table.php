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
        Schema::create('slugs', function (Blueprint $table) {
            $table->id();
            $table->boolean('available')->default(true);
            $table->string('name', 80);
            $table->string('color', 10)->nullable();
            $table->decimal('price', 8, 2);
            $table->timestamps();
            
            $table->foreignId('size_id')->constrained('sizes');
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
