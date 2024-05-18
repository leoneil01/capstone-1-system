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
        Schema::create('products', function (Blueprint $table) {
            $table->id('product_id');
            $table->string('product_name', 55);
            $table->unsignedBigInteger('supplier_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->string('barcode', 255);
            $table->decimal('unit_price', 10, 2);
            $table->integer('unit_in_stock');
            $table->timestamps();

            $table->foreign('supplier_id')
                ->references('supplier_id')
                ->on('suppliers')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->foreign('category_id')
                ->references('category_id')
                ->on('categories')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->foreign('brand_id')
                ->references('brand_id')
                ->on('brands')
                ->onUpdate('cascade')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
