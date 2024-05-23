<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class LoginPController extends Controller
{
    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
       
        $user = \App\Models\Professeur::where('email', $request->email)->first();
       
        if ($user && $request->password == $user->password) {
           
            Auth::login($user);
           
            $request->session()->regenerate();
            
            return redirect()->intended('home');
        }
       
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
