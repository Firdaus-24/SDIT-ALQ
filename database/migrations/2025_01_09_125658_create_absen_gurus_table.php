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
        Schema::create('absen_gurus', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('guru_id')->references('id')->on('gurus')->onDelete('cascade');
            $table->string('image_masuk')->nullable();
            $table->string('image_pulang')->nullable();
            $table->string('longitude_masuk')->nullable();
            $table->string('longitude_pulang')->nullable();
            $table->string('latitude_masuk')->nullable();
            $table->string('latitude_pulang')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absen_gurus');
    }
};
