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
        Schema::create('gurus', function (Blueprint $table) {
            $table->id();
            $table->string('images')->nullable();
            $table->string('nama');
            $table->foreignId('jab_id');
            $table->enum('jenis_kelamin',['P', 'L']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jurusan');
            $table->string('tahun_lulus');
            $table->integer('nuptk')->nullable();
            $table->string('noHP');
            $table->string('email')->unique();
            $table->foreignId('kelas_id')->nullable();
            $table->enum('is_active', ['T', 'F']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gurus');
    }
};
