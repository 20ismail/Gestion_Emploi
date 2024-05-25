<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateJourColumnInDisponibiliteProfsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('disponibilite_profs', function (Blueprint $table) {
            $table->string('jour')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('disponibilite_profs', function (Blueprint $table) {
            // Change back to the original type if necessary
            $table->date('jour')->change();
        });
    }
}