<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Professeur;

class LoginPController extends Controller
{
   







    public function authenticate(Request $request)
    {
        // Validation des champs de formulaire
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Recherche du professeur par email
        $prof = Professeur::where('email', $request->email)->first();

        if ($prof) {
            // Vérification du mot de passe
            if (Hash::check($request->password, $prof->password)) {
                // Authentification de l'utilisateur
                Auth::login($prof);
                $request->session()->regenerate();

                // Redirection vers la page "Home"
                return redirect()->intended('/Home');
            } else {
                // Debugging: Password mismatch
                return back()->withErrors([
                    'password' => 'Le mot de passe est incorrect.',
                ]);
            }
        } else {
            // Debugging: Email not found
            return back()->withErrors([
                'email' => 'L\'adresse e-mail n\'existe pas.',
            ]);
        }
    }
}

