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
        Schema::create('disponibilite_profs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idProf');
            $table->unsignedBigInteger('idSemestre');
            $table->string('semestre')->change();
            $table->string('lundi')->nullable()->change();
            $table->string('mardi')->nullable()->change();
            $table->string('mercredi')->nullable()->change();
            $table->string('jeudi')->nullable()->change();
            $table->string('vendredi')->nullable()->change();
            $table->string('samedi')->nullable()->change();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('idProf')->references('id')->on('professeurs')->onDelete('cascade');
            $table->foreign('idSemestre')->references('id')->on('semestres')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disponibilite_profs');
    }
};
