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

            $table->string('order_type')->default('store');
            $table->string('order_status');
            $table->decimal('order_subtotal', 8, 2)->default(0);
            $table->decimal('order_tax', 8, 2);
            $table->string('paid_status')->default('unpaid');
            $table->decimal('order_discount', 8, 2)->nullable();
            $table->string('order_discount_code')->nullable();
            $table->string('kitchen_note')->nullable();
            $table->string('delivery_note')->nullable();

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
