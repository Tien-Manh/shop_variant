<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('type_coupon');
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->integer('amount_code')->nullable();
            $table->float('price_value', 8,0);
            $table->string('type')->nullable();
            $table->integer('status')->default(1);
            $table->float('total_order_min', 8, 0)->nullable();
            $table->float('price_order_max', 8, 0)->nullable();
            $table->dateTime('date_start')->nullable();
            $table->dateTime('date_end')->nullable();
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
        Schema::dropIfExists('coupons');
    }
}
