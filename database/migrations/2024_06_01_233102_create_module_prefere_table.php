<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreatemoduleprefereTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('moduleprefere')) {
            Schema::create('moduleprefere', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('professeur_id');
                $table->unsignedBigInteger('semestre_id');
                $table->unsignedBigInteger('filiere_id');
                $table->unsignedBigInteger('module_id');
                $table->string('activity_type');
                $table->integer('groupes');
                $table->integer('groupesRester');
                $table->integer('heureassigne')->default(0); // Set default value or make it nullable
                $table->integer('heureannee');
                $table->timestamps();

                $table->foreign('professeur_id')->references('id')->on('professeurs')->onDelete('cascade');
                $table->foreign('semestre_id')->references('id')->on('semestres')->onDelete('cascade');
                $table->foreign('filiere_id')->references('id')->on('filieres')->onDelete('cascade');
                $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade');
                

            });

            // Récupération des données à partir des tables existantes
            $data = DB::table('professeurs')
                ->join('modules', 'modules.professeur_id', '=', 'professeurs.id')
                ->join('semestres', 'semestres.id', '=', 'modules.semestre_id')
                ->join('filieres', 'filieres.id', '=', 'modules.filiere_id')
                ->join('composants', 'composants.intitule', '=', 'modules.intitule')
                ->select(
                    'professeurs.id as professeur_id',
                    'semestres.id as semestre_id',
                    'filieres.id as filiere_id',
                    'modules.id as module_id',
                    'composants.intitule as activity_type',
                    'modules.nbr_groupes as groupes',
                    'modules.heuresCours as heureassigne',
                    'professeurs.heuresEnseignementAnnee as heureannee',
                    'modules.created_at',
                    'modules.updated_at'
                )
                ->get();


            // Insérer les données récupérées dans la table moduleprefere
            foreach ($data as $item) {
                DB::table('moduleprefere')->insert([
                    'professeur_id' => $item->professeur_id,
                    'semestre' => $item->semestre,
                    'filiere' => $item->filiere,
                    'module' => $item->module,
                    'activity_type' => $item->activity_type,
                    'groupes' => $item->groupes,
                    'groupesRester' => $item->groupesRester,
                    'heureassigne' => $item->heureassigne,
                    'heureannee' => $item->heureannee,
                    'created_at' => $item->created_at,
                    'updated_at' => $item->updated_at,
                ]);
            }
        }
    }

    public function down()
    {
        Schema::dropIfExists('moduleprefere');
    }
}