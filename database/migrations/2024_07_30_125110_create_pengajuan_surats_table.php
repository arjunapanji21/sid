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
        Schema::create('pengajuan_surats', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('no_surat')->nullable();
            $table->string('jenis_surat')->nullable();
            $table->string('status_pengajuan')->nullable();
            $table->string('tgl_pengajuan')->nullable();
            $table->string('tgl_selesai')->nullable();
            $table->text('data')->nullable();
            $table->text('file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_surats');
    }
};
