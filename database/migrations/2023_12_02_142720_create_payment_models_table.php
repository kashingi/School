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
        Schema::create('payment_models', function (Blueprint $table) {
            $table->id();
            $table->string('CheckoutRequestID');
            $table->string('MerchantRequestID');
            $table->tinyInteger('ResultCode');
            $table->float('Amount');
            $table->string('MpesaReceiptNumber');
            $table->string('PhoneNumber');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_models');
    }
};
