<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_detail', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->string('sku')->unique();
            $table->text('photo_thumb')->nullable();
            $table->float('cost', 11,0)->default(0);
            $table->float('price', 11,0)->default(0);
            $table->float('sell_price', 11, 0)->default(0);
            $table->integer('quantity')->default(0);
            $table->integer('sub_quantity')->default(0);
            $table->integer('is_default')->default(0);
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_detail');
    }
}
