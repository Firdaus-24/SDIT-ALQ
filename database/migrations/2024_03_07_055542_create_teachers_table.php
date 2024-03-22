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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('images')->nullable();
            $table->string('code', 10)->unique()->nullable();
            $table->string('name', 100);
            $table->string('alamat');
            $table->string('kelurahan')->nullable();
            $table->string('kota');
            $table->string('kodepos', 5);
            $table->enum('jenis_kelamin', ['P', 'W']);
            $table->string('agama');
            $table->string('bank');
            $table->string('rekening')->nullable();
            $table->string('no_ktp', 16);
            $table->dateTime('tgl_masuk');
            $table->dateTime('tgl_keluar')->nullable();
            $table->string('noHp');
            $table->string('email');
            $table->string('code_otp')->unique()->nullable();
            $table->foreignId('jab_id');
            $table->enum('status', ['nikah', 'singel', 'duda/janda']);
            $table->integer('jumlah_anak')->nullable();
            $table->enum('is_active', ['T', 'F']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
