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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('userId')->constrained(
                table: 'users', indexName: 'userIdForOrder'
            );
            $table->foreignId('addressId')->constrained(
                table: 'addresses', indexName: 'addressIdForOrder'
            );
            $table->foreignId('paymentId')->constrained(
                table: 'payments', indexName: 'paymentIdForOrder'
            );
            $table->enum('paymentMode', ['online', 'offline']);
            $table->double('price');
            $table->bigInteger('quantity');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
