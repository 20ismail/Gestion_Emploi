<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity; 
use App\Models\ModulePrefere;
use App\Models\Composant;
use App\Models\Professeur;
use Illuminate\Support\Facades\DB;// Assuming you have an Activity model

class ActiviteController extends Controller
{
    public function index()
    {
        $activities = Activity::all(); // Fetch all activities from the database
        return view('activite', compact('activities'));
    }
    public function deleteActivities(Request $request)
    {
        $idsToDelete = $request->input('delete', []);

        if (empty($idsToDelete)) {
            return back()->with('error', 'No activities selected for deletion.');
        }

        $activities = ModulePrefere::whereIn('id', $idsToDelete)->get();

        foreach ($activities as $activity) {
            // Update composants
            DB::table('composants')
                ->where('intitule', $activity->activity_type)
                ->increment('RestGroupe', $activity->groupes);

            // Update professeurs
            DB::table('professeurs')
                ->where('id', $activity->professeur_id)
                ->increment('heuresEnseignementAnnee', $activity->heureassigne);

            // Delete the activity
            $activity->delete();
        }

        return back()->with('success', 'Selected activities deleted and related data updated.');
    }
}