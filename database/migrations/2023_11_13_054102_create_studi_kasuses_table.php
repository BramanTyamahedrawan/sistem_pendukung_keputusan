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
        Schema::create('studi_kasuses', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kriteria')->nullable();
            $table->string('nama_kriteria')->nullable();
            $table->decimal('bobot_kriteria', 8, 2)->nullable();
            $table->boolean('jenis_kriteria')->default(false);
            $table->string('kode_alternatif')->nullable();
            $table->string('nama_alternatif')->nullable();
            $table->integer('nilai_c1')->nullable();
            $table->integer('nilai_c2')->nullable();
            $table->integer('nilai_c3')->nullable();
            $table->integer('nilai_c4')->nullable();
            $table->integer('nilai_c5')->nullable();
            $table->integer('max')->nullable();
            $table->integer('min')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studi_kasuses');
    }
};
