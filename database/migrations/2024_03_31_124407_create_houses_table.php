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
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->double('long_loc');
            $table->double('lat_loc');
            $table->boolean('is_for_sale')->comment('0 => for sale, 1 => for Rent');
            $table->double('price');
            $table->integer('space');
            $table->string('ownership_type')->nullable();
            $table->unsignedInteger('viewers_count');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('houses');
    }
};
