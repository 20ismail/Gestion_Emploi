<?php

namespace App\Http\Controllers;

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
            
        ]);
        $user = Auth::user();
        if ($request->hasFile('profileimage')) {
            // Delete the old profile image if it exists
            if ($user->profileimage) {
                Storage::disk('public')->delete($user->profileimage);
            }
    
            // Store the new profile image
            $path = $request->file('profileimage')->store('profile', 'public');
            $user->profileimage = $path;
        }
 
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->email = $request->email;
        if ($request->filled('email')) {
            $user->email = $request->email;
        } else {
            $user->email = $user->email; 
        }
        $user->matiere = implode(',', $request->matiere); 

       
        $user->save();

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
       $user = Auth::user();
       Log::info('Authenticated user: ', ['user_id' => $user->id]);

       // Check if the current password is correct
       if ($user && $request->current_password == $user->password) {
        try {
            // Update the user's password
            $user->password = $request->new_password;
            $user->save();
            Log::info('Password changed successfully for user ID: ' . $user->id);
 
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
