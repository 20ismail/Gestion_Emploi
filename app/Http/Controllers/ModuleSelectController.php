<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Moduleselect;

class ModuleSelectController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'professeur_id' => 'required|exists:professeurs,id',
            'semestre' => 'required|string',
            'filiere' => 'required|string',
            'module' => 'required|string',
            'activity_type' => 'required|string',
            'groupOptions' => 'nullable|array',
        ]);

        $moduleselect = new Moduleselect();
        $moduleselect->professeur_id = $request->professeur_id;
        $moduleselect->semestre = $request->semestre;
        $moduleselect->filiere = $request->filiere;
        $moduleselect->module = $request->module;
        $moduleselect->activity_type = $request->activity_type;
        $moduleselect->groupes = json_encode($request->groupOptions);
        $moduleselect->save();

        return redirect()->back()->with('success', 'Module ajouté avec succès');
}


}
