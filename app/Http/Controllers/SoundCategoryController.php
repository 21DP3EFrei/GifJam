<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skana_Kategorija;

class SoundCategoryController extends Controller
{
        // Method to list all categories MAIN DISPLAY
        public function index()
        {
            $SoundCategory = Skana_Kategorija::all();
            $SoundCategory = Skana_Kategorija::with('parent')->get();
        
            return view('sound-categories.index', compact('SoundCategory'));
        }
    // Method to display the form for creating a new category
    public function create()
    {
        $SoundCategory = Skana_Kategorija::all();
        return view('sound-categories.create', compact('SoundCategory'));
    }

    // Method to store the newly created category
    public function store(Request $request)
    {
        $request->validate([
            'Kat_Nosaukums' => 'required|string|max:100',
            'Apraksts' => 'nullable|string|max:300',
            'Apakskategorija' => 'nullable|exists:skanas_kategorija,SKat_ID'
        ]);

        Skana_Kategorija::create([
            'Nosaukums' => $request->Kat_Nosaukums,
            'Apraksts' => $request->Apraksts, 
            'Apakskategorija' => $request->Apakskategorija,
        ]);

        return redirect()->route('sound-categories.index')->with('success', __('translation.ScCreate'));
    }

    // Method to display a form for editing a category
    public function edit(Skana_Kategorija $SoundCategory)
    {
        $allSoundCategories = Skana_Kategorija::all(); 
        return view('sound-categories.edit', compact('SoundCategory', 'allSoundCategories'));
    }
    

    // Method to update the edited category
    public function update(Request $request, Skana_Kategorija $SoundCategory)
    {
        $request->validate([
            'Kat_Nosaukums' => 'required|string|max:100',
            'Apraksts' => 'nullable|string|max:300',
            'Apakskategorija' => 'nullable|exists:skanas_kategorija,SKat_ID'
        ]);

        $SoundCategory->update([
            'Nosaukums' => $request->Kat_Nosaukums,
            'Apraksts' => $request->Apraksts,
            'Apakskategorija' => $request->Apakskategorija,
        ]);

        return redirect()->route('sound-categories.index')->with('success', __('translation.scUpdate'));
    }

    // Method to delete a category
    public function destroy(Skana_Kategorija $SoundCategory)
    {
        $SoundCategory->delete();

        return redirect()->route('sound-categories.index')->with('success', __('translation.scDelete'));
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}