<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModuleSelect;
use Illuminate\Support\Facades\DB;

class ModuleSelectController extends Controller
{
    public function index()
    {
        return view('activite');
    }
    public function store(Request $request)
    {
        $moduleSelect = new ModuleSelect();
        $moduleSelect->professeur_id = $request->professeur_id;
        $moduleSelect->semestre = $request->semestre;
        $moduleSelect->filiere = $request->filiere;
        $moduleSelect->module = $request->module;
        $moduleSelect->activity_type = $request->activity_type;
        $moduleSelect->groupes = json_encode($request->groupOptions);
        $moduleSelect->save();

        return redirect()->back()->with('success', 'Module ajouté avec succès');
    }

    public function showActivities()
{
    // Récupérer les modules, types d'activités et groupes ajoutés par le professeur
    $activities = DB::table('moduleselect')
        ->select('module', 'activity_type', 'groupes')
        ->get();

    // Passer les données à la vue
    return view('activities', compact('activities'));
}
}