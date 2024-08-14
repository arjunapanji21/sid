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
        Schema::create('new_users', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('tgl_lahir')->nullable();
            $table->enum('jk', ['Laki-laki', 'Perempuan']);
            $table->enum('gol_darah', ['-', 'A', 'B', 'AB', 'O']);
            $table->string('alamat')->nullable();
            $table->string('agama')->nullable();
            $table->string('status')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('kewarganegaraan')->nullable();
            $table->text('pasfoto')->nullable();
            $table->text('ktp')->nullable();
            $table->string('email')->nullable();
            $table->string('password');
            $table->enum('konfirmasi', ['Pending', 'Confirmed']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('new_users');
    }
};
