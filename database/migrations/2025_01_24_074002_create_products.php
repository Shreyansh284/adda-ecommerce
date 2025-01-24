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
            $table->id();
            $table->string('productName');
            $table->string('description');
            $table->double('price',);
            $table->double('discount',);
            $table->string('material',);
            $table->string('additionalInfo');
            $table->foreignId('categoryId')->constrained(
                table: 'categories', indexName: 'categoryIdForProduct'
            )->onDelete('cascade');
            $table->foreignId('subCategoryId')->constrained(
                table: 'sub_categories', indexName: 'subCategoryIdForProduct'
            )->onDelete('cascade');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
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
