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
        Schema::create('keterlambatan_gurus', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('teacher_id')->require();
            $table->foreignId('jab_id')->require();
            $table->dateTime('tanggal');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keterlambatan_gurus');
    }
};
