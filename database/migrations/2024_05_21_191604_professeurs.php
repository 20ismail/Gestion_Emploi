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
        Schema::create('professeurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
               $table->string('prenom');
               $table->string('email')->unique();
               $table->string('numTelephone');
               $table->string('password');
               $table->string('type');
               $table->integer('heuresEnseignementAnnee');
               $table->text('profileimage')->nullable();
               $table->unsignedBigInteger('idDepartement');
               $table->unsignedBigInteger('idCoordonateur');
               $table->timestamps();

               // Foreign keys
               $table->foreign('idDepartement')->references('id')->on('departements')->cascadeOnDelete()->cascadeOnUpdate();
               $table->foreign('idCoordonateur')->references('id')->on('cordonateurs')->cascadeOnDelete()->cascadeOnUpdate();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professeurs');
    }
};
