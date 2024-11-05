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
        Schema::table('medis', function (Blueprint $table) {
            $table->string('progress')->default('Perlu Tanggapan')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('medis', function (Blueprint $table) {
            $table->string('progress')->default('BERJALAN')->change();
        });
    }
};
