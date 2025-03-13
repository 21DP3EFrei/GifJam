<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class UserController extends Controller
{
    // Update the user's profile
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;


        return redirect()->route('user.profile')->with('success', 'Profile updated successfully.');
    }
        public function destroy(User $user)
        {
            if (Auth::id() !== $user->id) {
                return redirect()->route('home')->with('error', 'Unauthorized action.');
            }
    
            Auth::logout(); 
            $user->delete(); 
    
            return redirect('/')->with('success', 'Account deleted successfully.');
        }
    }
