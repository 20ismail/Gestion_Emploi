<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Professeur;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile', ['user' => Auth::user()]);
    }
    public function update(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'profileimage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'numTelephone' => 'nullable|numeric',
            'heuresEnseignementAnnee' => 'nullable|numeric',
        ]);
        $prof = Auth::user();
        if ($request->hasFile('profileimage')) {
            // Delete the old profile image if it exists
            if ($prof->profileimage) {
                Storage::disk('public')->delete($prof->profileimage);
            }
    
            // Store the new profile image
            $path = $request->file('profileimage')->store('profile', 'public');
            $prof->profileimage = $path;
        }
 
        $prof->nom = $request->nom;
        $prof->heuresEnseignementAnnee = $request->heuresEnseignementAnnee;
        $prof->numTelephone = $request->numTelephone;
        $prof->prenom = $request->prenom;
        $prof->email = $request->email;
        if ($request->filled('email')) {
            $prof->email = $request->email;
        } else {
            $prof->email = $prof->email; 
        }
        $prof->save();
        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }
    
   public function changePassword(Request $request)
   {
       Log::info('Change password request received');

       // Validate the request
       $request->validate([
           'current_password' => 'required',
           'new_password' => 'required|string|min:8|confirmed',
       ]);

       // Get the currently authenticated user
       $prof = Auth::user();
       Log::info('Authenticated user: ', ['user_id' => $prof->id]);

       // Check if the current password is correct
       if ($prof && $request->current_password == $prof->password) {
        try {
            // Update the user's password
            $prof->password = $request->new_password;
            $prof->save();
            Log::info('Password changed successfully for user ID: ' . $prof ->id);
 
            // Redirect back with a success message
            return back()->with('success', 'Password changed successfully.');
        } catch (\Exception $e) {
            Log::error('Failed to update the password: ', ['error' => $e->getMessage()]);
            return back()->withErrors(['error' => 'Failed to update the password. Please try again.']);
        }
       }
    //    try {
    //        // Update the user's password
    //        $user->password = $request->new_password;
    //        $user->save();
    //        Log::info('Password changed successfully for user ID: ' . $user->id);

    //        // Redirect back with a success message
    //        return back()->with('success', 'Password changed successfully.');
    //    } catch (\Exception $e) {
    //        Log::error('Failed to update the password: ', ['error' => $e->getMessage()]);
    //        return back()->withErrors(['error' => 'Failed to update the password. Please try again.']);
    //    }
   }
}
