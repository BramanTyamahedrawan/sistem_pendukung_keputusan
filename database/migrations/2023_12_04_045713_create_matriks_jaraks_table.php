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
        Schema::create('matriks_jaraks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_alternatif');
            $table->foreign('id_alternatif')->references('id')->on('alternatifs')->onDelete('cascade');
            $table->unsignedBigInteger('id_kriteria');
            $table->foreign('id_kriteria')->references('id')->on('kriterias')->onDelete('cascade');
            $table->decimal('nilai', 8, 4);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matriks_jaraks');
    }
};
