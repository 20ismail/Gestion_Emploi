<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUpdatedAtToProfesseursTable extends Migration
{
    public function up()
    {
        Schema::table('professeurs', function (Blueprint $table) {
            $table->timestamp('updated_at')->nullable();
        });
    }

    public function down()
    {
        Schema::table('professeurs', function (Blueprint $table) {
            $table->dropColumn('updated_at');
        });
    }
}