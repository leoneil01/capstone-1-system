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
        Schema::create('sales', function (Blueprint $table) {
            $table->id('item_id');
            $table->string('product_name');
            $table->integer('qty');
            $table->decimal('unit_price', 10, 2);
            $table->unsignedBigInteger('transaction_id');
            $table->timestamps();

            $table->foreign('transaction_id')
                ->references('transaction_id')
                ->on('transactions')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
