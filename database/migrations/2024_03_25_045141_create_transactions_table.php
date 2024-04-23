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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('no_booking');
            $table->unsignedBigInteger('user_id');
            $table->string('customer_name');
            $table->bigInteger('phone_number');
            $table->string('email');
            $table->string('passanger_name');
            $table->unsignedBigInteger('flight_id');
            $table->unsignedBigInteger('airline_id');
            $table->integer('total_price');
            $table->string('payment_status');
            $table->timestamps();

            $table->foreign('flight_id')->references('id')->on('flights');
            $table->foreign('airline_id')->references('id')->on('airlines');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
