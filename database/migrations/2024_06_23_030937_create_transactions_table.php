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
            $table->id('transaction_id');
            $table->unsignedBigInteger('payment_id')->nullable();
            $table->unsignedBigInteger('discount_id')->nullable();
            $table->float('total');
            $table->float('cash');
            $table->float('change');
            $table->timestamps();

            $table->foreign('payment_id')
                ->references('payment_id')
                ->on('payments')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->foreign('discount_id')
                ->references('discount_id')
                ->on('discounts')
                ->onUpdate('cascade')
                ->onDelete('set null');
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
