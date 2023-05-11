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
        Schema::create('armada_mobils', function (Blueprint $table) {
            $table->id();
            $table->enum('car_status', ['Tersedia', 'Dipesan']);
            $table->string('plat')->unique();
            $table->foreignId('car_id')->constrained('cars')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('armada_mobils');
    }
};
