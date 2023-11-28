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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('special_request');
            $table->double('total_amount');
            $table->foreignIdFor(\App\Models\Customer::class)->constrained();
            $table->foreignIdFor(\App\Models\OrderStatus::class)->constrained();
            $table->dateTime('pick_up_time');
            $table->json('orderItems');
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
};
