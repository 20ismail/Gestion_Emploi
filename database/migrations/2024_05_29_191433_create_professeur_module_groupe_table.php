<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesseurModuleGroupeTable extends Migration
{
    public function up()
    {
        Schema::create('professeur_module_groupe', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('professeur_id');
            $table->unsignedBigInteger('module_id');
            $table->unsignedBigInteger('groupe_id');
            $table->unsignedBigInteger('semestre_id');
            $table->timestamps();

            // Add foreign key constraints if necessary
            $table->foreign('professeur_id')->references('id')->on('professeurs')->onDelete('cascade');
            $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade');
            $table->foreign('groupe_id')->references('id')->on('groupe_affectes')->onDelete('cascade');
            $table->foreign('semestre_id')->references('id')->on('semestres')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('professeur_module_groupe');
}
}
