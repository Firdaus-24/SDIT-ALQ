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
        Schema::create('kesalahan_details', function (Blueprint $table) {
            $table->uuid('id');
            $table->foreignId('student_id')->require();
            $table->foreignId('kesalahan_id')->require();
            $table->dateTime('tanggal')->require();
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kesalahan_details');
    }
};
