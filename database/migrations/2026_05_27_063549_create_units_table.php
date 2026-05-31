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
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', ['studio', '1br', '2br', '3br']);
            $table->string('tower');
            $table->string('floor');
            $table->string('room_number');
            $table->text('description')->nullable();
            $table->integer('size_sqm');
            $table->decimal('price', 15, 2);
            $table->enum('listing_type', ['rent', 'sell']);
            $table->enum('status', ['available', 'booked', 'sold'])->default('available');
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
