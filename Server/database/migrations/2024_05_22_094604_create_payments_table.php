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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->id('order_id');
            $table->decimal('amount', 10, 2);
            $table->enum('payment_method', ['credit_card', 'cash', 'paypal', 'gateway']);
            $table->enum('status', ['pending', 'success', 'failed'])->default('pending');
            $table->string('transaction_id')->nullable();
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
