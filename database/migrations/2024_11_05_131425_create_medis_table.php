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
        Schema::create('medis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('telp');
            $table->string('lokasi');
            $table->date('tanggal');
            $table->text('perihal');
            $table->string('progress')->default('Belum Dimulai');
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medis');
    }
};
