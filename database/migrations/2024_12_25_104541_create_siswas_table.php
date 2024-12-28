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
        Schema::create('siswas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nis')->unique()->nullable();
            $table->string('nisn')->unique()->nullable();
            $table->string('nama');
            $table->enum('jenis_kelamin', ['P', 'L'])->nullable();
            $table->string('rombel')->nullable();
            $table->string('tempat_lahir', 100)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('agama', 20)->nullable();
            $table->string('wali')->nullable();
            $table->boolean('is_lulus')->default(false);
            $table->foreignId('kelas_id')->nullable();
            $table->string('images')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
