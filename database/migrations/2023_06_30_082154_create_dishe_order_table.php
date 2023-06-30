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
        Schema::create('dishe_order', function (Blueprint $table) {
            $table->unsignedBigInteger('dishe_id');
            $table->foreign('dishe_id')->references('id')->on('dishes')->onDelete('cascade');

            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');

            $table->primary(['dishe_id', 'order_id']);

            $table->unsignedInteger('quantity')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dishe_order');
    }
};
