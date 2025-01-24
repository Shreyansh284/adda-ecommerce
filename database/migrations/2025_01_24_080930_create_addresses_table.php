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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('userId')->constrained(
                table: 'users', indexName: 'userIdForAddress'
            );
            $table->string('address');
            $table->foreignId('stateId')->constrained(
                table: 'states', indexName: 'stateIdForAddress'
            );
            $table->foreignId('cityId')->constrained(
                table: 'cities', indexName: 'cityIdForAddress'
            );
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
