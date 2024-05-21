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
        Schema::create('salle_ests', function (Blueprint $table) {
            $table->id();
            $table->string('TypeSalle');
            $table->integer('numero');
            $table->unsignedBigInteger('idCordonateur');
            $table->foreign('idCordonateur')->references('id')->on('cordonateurs')->onDelete('cascade');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salle_ests');
    }
};
