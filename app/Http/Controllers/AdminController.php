<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $user_type = Auth::user()->usertype;
            
            if ($user_type == 'admin') {
                return view('admin.index');
            } else {
                // Redirect regular users to the login page
                return redirect()->route('login');
            }
        } else {
            // Redirect unauthenticated users to the login page
            return redirect()->route('login');
        }
    }
    
}
