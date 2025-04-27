<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;
use Illuminate\Support\Facades\Auth;
class WelcomeController extends Controller
{
    
    public function index()
    {       
        $media = Media::where('Lietotajs', Auth::id())->get()->last();
        $check = Media::where('Lietotajs', Auth::id())->exists();
        return view('welcome', compact('media', 'check'));

    }
    public function __construct()
    {
        $this->middleware('auth');
    }
}
