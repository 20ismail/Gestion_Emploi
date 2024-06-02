<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filiere;
use App\Models\Semestre;
use App\Models\Module;
use App\Models\Composant;

class ModulePController extends Controller
{
    public function index()
    {
        return view('module'); 
    }

    public function getFilieres()
    {
        $filieres = Filiere::all();
        return response()->json($filieres);
    }

    public function getSemestres()
    {
        $semestres = Semestre::all();
        return response()->json($semestres);
    }

    public function getModules(Request $request)
    {
        \Log::info('Request parameters:', $request->all());
        $modules = Module::where('id_filiere', $request->id_filiere)->get();
        return response()->json($modules);
    }

    public function getGroupes(Request $request)
    {
        $groupes = Composant::where('idModule', $request->module_id)
                            ->where('activity_type', $request->activity_type)
                            ->get();
        return response()->json($groupes);
    }
}