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
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_product_id');
            $table->foreign('order_product_id')->references('id')->on('order_products')->cascadeOnDelete();
            $table->unsignedBigInteger('courier_id');
            $table->foreign('courier_id')->references('id')->on('couriers')->cascadeOnDelete();
            $table->dateTime('delivery_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliveries');
    }
};
