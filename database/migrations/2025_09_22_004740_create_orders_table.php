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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            
            $table->float('shipping_cost');
            $table->float('discount_amount');
            $table->string('cupom_code', 80)->nullable();
            $table->float('total_price');
            $table->string('order_code')->unique();
            $table->string('payment_method', 30);
            $table->datetime('paid_at')->nullable();
            $table->text('id_transition')->nullable();
            $table->string('shipping_method', 30);
            $table->string('tracking_code', 30)->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();

        });

        Schema::create('order_product', function (Blueprint $table) {
            $table->id();
            $table->float('price_unit');
            $table->integer('quantity');
            $table->float('subtotal');
            $table->timestamps();

            $table->foreignId('product_id')->constrained('products');
            $table->foreignId('order_id')->constrained('orders');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_product');
        Schema::dropIfExists('orders');
    }
};
