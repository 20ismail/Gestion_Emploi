<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModulePrefere;
use Illuminate\Support\Facades\DB;
use App\Models\Professeur;
use App\Models\Filiere;
use App\Models\Semestre;
use App\Models\Module;
use App\Models\Composant;
use Illuminate\Support\Facades\Log;
class ModulePrefereController extends Controller
{
    public function showForm()
{
    $professeur = auth()->user(); // Get the authenticated Professeur
    return view('test', ['professeur' => $professeur]);
}
    // public function test()
    // {
    //     return view('test'); 
    // }
    public function insert(Request $request)
{
    $validatedData = $request->validate([
        'professeur_id' => 'required|exists:professeurs,id',
        'semestre_id' => 'required|exists:semestres,id',
        'filiere_id' => 'required|exists:filieres,id',
        'module_id' => 'required|exists:modules,id',
        'activity_type' => 'required|string',
        'heureannee' => 'required|integer',
        'nbr_groupes' => 'required|integer',
        'groupes' => 'required|array',
        'groupes.*' => 'integer',
    ]);

    $modulePrefere = new ModulePrefere();
    $modulePrefere->professeur_id = $validatedData['professeur_id'];
    $modulePrefere->semestre_id = $validatedData['semestre_id'];
    $modulePrefere->filiere_id = $validatedData['filiere_id'];
    $modulePrefere->module_id = $validatedData['module_id'];
    $modulePrefere->activity_type = $validatedData['activity_type'];
    $modulePrefere->heureannee = $validatedData['heureannee'];
    $modulePrefere->groupes = count($validatedData['groupes']);
    $modulePrefere->groupesRester = $validatedData['nbr_groupes'] - count($validatedData['groupes']);
    $modulePrefere->save();

    // Update the remaining groups and assigned hours
    $module = Module::find($validatedData['module_id']);
    $professeur = Professeur::find($validatedData['professeur_id']);
    
    if ($module && $professeur) {
        Log::info('Activity Type:', ['type' => $validatedData['activity_type']]);
        Log::info('Module Details:', ['heuresCours' => $module->heuresCours, 'heuresTD' => $module->heuresTD, 'heuresTP' => $module->heuresTP]);
    
        switch ($validatedData['activity_type']) {
            case 'cours':
                $modulePrefere->heureassigne = $module->heuresCours * $modulePrefere->groupes;
                break;
            case 'td':
                $modulePrefere->heureassigne = $module->heuresTD * $modulePrefere->groupes;
                break;
            case 'tp':
                $modulePrefere->heureassigne = $module->heuresTP * $modulePrefere->groupes;
                break;
            default:
                $modulePrefere->heureassigne = 0;
                break;
        }
    
        Log::info('Calculated heureassigne:', ['heureassigne' => $modulePrefere->heureassigne]);
    
        // Calculate new heuresEnseignementAnnee
        $newHeuresEnseignementAnnee = $professeur->heuresEnseignementAnnee - $modulePrefere->heureassigne;
        Log::info('New heuresEnseignementAnnee:', ['newHeuresEnseignementAnnee' => $newHeuresEnseignementAnnee]);
    
        // Update Professeur's heuresEnseignementAnnee
        $professeur->heuresEnseignementAnnee = $newHeuresEnseignementAnnee;
        $professeur->save();
    
        $modulePrefere->save();
    }
// Fetch and update the Composant
$composant = Composant::where('idfiliere', $modulePrefere->filiere_id)
->where('idsemestre', $modulePrefere->semestre_id)
->where('intitule', $validatedData['activity_type'])
->first();

if ($composant) {
$composant->RestGroupe = $modulePrefere->groupesRester;
$composant->save();
Log::info('Composant updated successfully', ['RestGroupe' => $composant->RestGroupe]);
} else {
Log::error('Composant not found or update failed');
}

 return response()->json([
        'success' => true,
        'newHeuresEnseignementAnnee' => $professeur->heuresEnseignementAnnee,
        'groupesRester' => $modulePrefere->groupesRester,
        'nbrGroupes' => $validatedData['nbr_groupes']
    ]);
}
    /*
     * Store a newly created module preference in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getGroupData(Request $request)
{
    $activityType = $request->activity_type;
    $semestreId = $request->semestre_id;

    $nbr_groupes = DB::table('composants')
                     ->where('intitule', $activityType)
                     ->where('idsemestre', $semestreId)
                     ->value('nbr_groupes');

    $groupesRester = DB::table('moduleprefere')
                       ->where('activity_type', $activityType)
                       ->where('semestre_id', $semestreId)
                       ->sum('groupes_rester');

    return response()->json(['nbr_groupes' => $nbr_groupes, 'groupesRester' => $groupesRester]);
}
public function store(Request $request)
    {
        Log::info('Entering store method'); // Log entry point
        
        Log::info('Request Data:', $request->all()); // Log all incoming request data

        try {
            Log::info('Attempting validation');
            $validatedData = $request->validate([
                'professeur_id' => 'required|integer',
                'semestre_id' => 'required|integer',
                'filiere_id' => 'required|integer',
                'module_id' => 'required|integer',
                'activity_type' => 'required|string',
                'groupes' => 'required|integer',
                'heureassigne' => 'required|integer',
                'heureannee' => 'required|integer',
            ]);

            Log::info('Validated Data:', $validatedData);

            Log::info('Creating new ModulePrefere instance');
            $modulePrefere = new ModulePrefere();
            $modulePrefere->professeur_id = $validatedData['professeur_id'];
            $modulePrefere->semestre_id = $validatedData['semestre_id'];
            $modulePrefere->filiere_id = $validatedData['filiere_id'];
            $modulePrefere->module_id = $validatedData['module_id'];
            $modulePrefere->activity_type = $validatedData['activity_type'];
            $modulePrefere->groupes = $validatedData['groupes'];
            $modulePrefere->heureassigne = $validatedData['heureassigne'];
            $modulePrefere->heureannee = $validatedData['heureannee'];

            $nbr_groupes = DB::table('composants')
                             ->where('intitule', $validatedData['activity_type'])
                             ->value('nbr_groupes');
            $groupesRester = $nbr_groupes - $validatedData['groupes'];

            $modulePrefere->groupesRester = $groupesRester;
            $modulePrefere->save();

            Log::info('Data successfully saved');

            return redirect()->back()->with('success', 'Module ajouté avec succès');
        } catch (\Exception $e) {
            Log::error('Error storing module preference: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while adding the module.');
        }
    }
    /**
     * Display the activities added by the professor.
     *
     * @return \Illuminate\Http\Response
     */
    public function showActivities()
    {
        // Retrieve modules, activity types, and groups added by the professor
        $activities = DB::table('moduleprefere')
            ->select('id','module_id', 'activity_type', 'groupes','heureassigne','heureannee')
            ->get();

        // Pass the data to the view
        return view('activities', compact('activities'));
    }
    public function calculateAndUpdateHours()
    {
        // Retrieve all entries from moduleprefere
        $modulePrefereEntries = ModulePrefere::all();
    
        foreach ($modulePrefereEntries as $entry) {
            // Find the corresponding module based on the 'module' field
            $module = Module::where('intitule', $entry->module)->first();
    
            if ($module) {
                // Calculate total hours for the module
                $totalHours = ($module->heuresCours + $module->heuresTD + $module->heuresTP);
    
                // Fetch the count of each selected intitule from the composants table
                $countIntitule = DB::table('composants')
                                   ->where('intitule', $entry->module)
                                   ->count();
    
                // Multiply total hours by the count of intitule
                $totalHours *= $countIntitule;
    
                // Calculate heureannee
                $heureannee = $totalHours - $entry->heureassigne;
    
                // Update heureannee in moduleprefere
                $entry->heureannee = $heureannee;
                $entry->save();
            }
        }
    
        return response()->json([
            'message' => 'Heureannee updated successfully for all moduleprefere entries.',
        ]);
    }
    public function index()
    {
        return view('module'); 
    }

    public function getSemestres()
    {
        $semestres = Semestre::all();
        return response()->json($semestres);
    }

    public function getFilieres()
    {
        $filieres = Filiere::all();
        return response()->json($filieres);
    }

    public function getModules(Request $request)
    {
        $modules = Module::all();
        return response()->json($modules);
    }

    public function getGroupes(Request $request)
    {
        $activityType = $request->activity_type;
        $semestreId = $request->semestre_id;
    
        // Fetch the groups along with their ids, names, and count
        $nbr_groupes = DB::table('composants')
                     ->join('semestres', 'composants.idsemestre', '=', 'semestres.id')
                     ->where('semestres.id', $semestreId)
                     ->where('composants.intitule', $activityType)
                     ->get(['composants.id', 'composants.intitule', 'composants.nbr_groupes']);
    
        if ($nbr_groupes->isEmpty()) {
            \Log::error('No groups found for the given semestre and activity type.');
            return response()->json([]);
        }
    
        return response()->json($groupes);
    }
    // In your ModulePrefereController or a relevant controller

public function getGroupesRester(Request $request) {
    $activityType = $request->activity_type;
    $semestreId = $request->semestre_id;

    // Example of fetching groupesRester, implement according to your application logic
    $groupesRester = DB::table('moduleprefere')
                        ->where('activity_type', $activityType)
                        ->where('semestre_id', $semestreId)
                        ->sum('groupes_rester'); // This is just an example calculation

    return response()->json(['groupesRester' => $groupesRester]);
}
public function fetchActivityTypes()
{
    $activities = DB::table('composants')->distinct()->pluck('intitule');
    return response()->json($activities);
}
public function fetchData($type)
{
    $data = Composant::where('intitule', $type)->first();

    if ($data) {
        return response()->json([
            'nbrGroupes' => $data->nbr_groupes,
            'groupesRester' => $data->RestGroupe,
        ]);
    }

    return response()->json([
        'nbrGroupes' => 0,
        'groupesRester' => 0,
    ]);
}
public function getRestGroupe(Request $request)
{
    $module_id = $request->module_id;
    $composant = Composant::where('id', $module_id)->first();

    if ($composant) {
        return response()->json(['RestGroupe' => $composant->RestGroupe]);
    }

    return response()->json(['RestGroupe' => 0]);
}
    
}