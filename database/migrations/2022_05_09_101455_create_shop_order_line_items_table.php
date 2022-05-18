<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_order_line_items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('order_id')->references('id')->on('shop_orders')->cascadeOnDelete();
            $table->foreignId('product_id')->references('id')->on('shop_products');

            $table->integer('qty')->default(1);
            $table->integer('price_cents');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_order_line_items');
    }
};
