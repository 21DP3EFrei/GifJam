<?php
namespace App\Http\Controllers;

use App\Models\Lietotajs;
use Illuminate\Http\Request;

class LietotajiController extends Controller
{
    public function index()
    {
        // Fetch all lietotaji
        $lietotaji = Lietotajs::all();
        return view('lietotaji.index', compact('lietotaji'));
    }

    // Other controller methods like create, store, edit, update, destroy can be added here
}

