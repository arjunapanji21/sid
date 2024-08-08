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
        Schema::create('informasi_desas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('judul');
            $table->text('konten');
            $table->string('tanggal');
            $table->integer('jumlah_dilihat')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informasi_desas');
    }
};
