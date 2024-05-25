<?php

namespace App\Http\Controllers;

use App\Models\DisponibiliteProf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DisponibiliteProfController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id_prof = Auth::user()->id;
        $disponibilites = DisponibiliteProf::where('id_prof', $id_prof)->get()->groupBy('jour');
        return view('dispo', compact('disponibilites'));
    }


    public function store(Request $request)
    {
        $id_prof = Auth::user()->id;
        $id_semestre = $request->input('semestre') === 'semestre1' ? 1 : 2;

        foreach (['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi'] as $day) {
            $matin = in_array('Matin', $request->input($day, []));
            $apres_midi = in_array('Après-midi', $request->input($day, []));

            DisponibiliteProf::updateOrCreate(
                ['jour' => $day, 'id_prof' => $id_prof, 'id_semestre' => $id_semestre],
                ['matin' => $matin, 'apres_midi' => $apres_midi]
            );
        }

        return redirect()->back()->with('success', 'Disponibilité enregistrée avec succès.');
    }

    public function update(Request $request)
    {
        return $this->store($request);
    }
}
