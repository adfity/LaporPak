<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('medis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('telp');
            $table->string('lokasi');
            $table->date('tanggal');
            $table->text('perihal');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('medis');
    }
};
