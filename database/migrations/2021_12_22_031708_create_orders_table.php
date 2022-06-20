<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_code');
            $table->integer('user_id');
            $table->integer('customer_id');
            $table->dateTime('order_date');
            $table->float('sub_total', 11, 0);
            $table->float('total', 11, 0);
            $table->string('payment_method');
            $table->string('payment_id')->nullable();
            $table->integer('status_method')->default(0);
            $table->string('messages')->nullable();
            $table->string('ship_to_address')->nullable();
            $table->string('payment_status');
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
        Schema::dropIfExists('orders');
    }
}
