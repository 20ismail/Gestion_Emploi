<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Professeur;
use App\Notifications\NewProfesseurNotification;

class ProfesseurController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'heuresEnseignementAnnee' => 'required|integer',
            'image' => 'nullable|string',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:professeurs,email',
            'numTelephone' => 'required|string|max:20',
            'password' => 'required|string|min:8',
            'type' => 'required|string',
            'id_admin' => 'required|exists:administrateurs,id',
            'id_departement' => 'required|exists:departements,id',
        ]);

        // Create the new Professeur
        $professeur = Professeur::create($validatedData);

        // Notify the admin
        $professeur->admin->notify(new NewProfesseurNotification($professeur));

        return response()->json(['message' => 'Professeur created and notification sent.'], 201);
    }
}