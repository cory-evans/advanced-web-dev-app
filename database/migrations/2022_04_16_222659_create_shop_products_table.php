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
        Schema::create('shop_product_categories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('name');
        });

        Schema::create('shop_products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('title');
            $table->text('description');
            $table->bigInteger('price_cents');
            $table->boolean('is_featured')->default(false);
            $table->foreignId('media_id')->references('id')->on('media');

            $table->foreignId('category_id')->references('id')->on('shop_product_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_products');
        Schema::dropIfExists('shop_product_categories');
    }
};
