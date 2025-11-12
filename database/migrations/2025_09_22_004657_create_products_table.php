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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('available')->default(true);
            $table->decimal('price', 8, 2);
            $table->integer('quantity')->default(100);
            $table->text('description');
            $table->text('short_description');
            $table->timestamps();
        });

        Schema::create('collections', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->timestamps();
        });

        Schema::create('collection_product', function (Blueprint $table) {
            $table->boolean('status');
            $table->timestamps();
            $table->foreignId('collection_id')->constrained('collections');
            $table->foreignId('product_id')->constrained('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collection_product');
        Schema::dropIfExists('collections');
        Schema::dropIfExists('products');
    }
};
