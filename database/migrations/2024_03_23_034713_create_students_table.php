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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('nisn', 10)->unique()->nullable();
            $table->string('name');
            $table->enum('jenis_kelamin', ['P', 'W']);
            $table->string('tempat_lahir', 100);
            $table->date('tgl_lahir');
            $table->string('agama', 20);
            $table->string('wali');
            $table->enum('is_lulus', ['T', 'F']);
            $table->integer('kelas');
            $table->string('images')->nullable();
            $table->enum('is_active', ['T', 'F']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
