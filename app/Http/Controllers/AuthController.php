<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            // Authentication successful
            return redirect()->route('welcome');
        } else {
            // Authentication failed
            return redirect()->route('login')->with('error', 'Invalid credentials');
        }
    }
    

    public function showRegistrationForm()
    {
        return view('registration');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8', // Example: Minimum password length of 8 characters
        ]);
    
        // Create a new user instance
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        
        // Save the user record to the database
        $user->save();
    
        // After successful registration, redirect to login page
        return redirect()->route('login')->with('success', 'Registration successful. You can now log in.');
    }
    public function welcome()
    {
        return view('welcome');
    }
}
