<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skana_kategorija;

class SoundCategoryController extends Controller
{
    //Page that displays all categories
    public function index()
    {
        $SoundCategory = Skana_kategorija::all();
        $SoundCategory = Skana_kategorija::with('parent')->get();
    
        return view('sound-categories.index', compact('SoundCategory'));
    }
    // Function to display the form for creating a new category
    public function create()
    {
        $SoundCategory = Skana_kategorija::all();
        return view('sound-categories.create', compact('SoundCategory'));
    }

    // Function to store the newly created category
    public function store(Request $request)
    {
        $request->validate([
            'Kat_Nosaukums' => 'required|string|max:100',
            'Apraksts' => 'nullable|string|max:300',
            'Apakskategorija' => 'nullable|exists:skana_kategorija,SKat_ID'
        ]);

        Skana_kategorija::create([
            'Nosaukums' => $request->Kat_Nosaukums,
            'Apraksts' => $request->Apraksts, 
            'Apakskategorija' => $request->Apakskategorija,
        ]);

        return redirect()->route('sound-categories.index')->with('success', __('translation.ScCreate'));
    }

    // Function to display a form for editing a category
    public function edit(Skana_kategorija $SoundCategory)
    {
        $allSoundCategories = Skana_kategorija::all(); 
        return view('sound-categories.edit', compact('SoundCategory', 'allSoundCategories'));
    }
    

    // Function to update the edited category
    public function update(Request $request, Skana_kategorija $SoundCategory)
    {
        $request->validate([
            'Kat_Nosaukums' => 'required|string|max:100',
            'Apraksts' => 'nullable|string|max:300',
            'Apakskategorija' => 'nullable|exists:skana_kategorija,SKat_ID'
        ]);

        $SoundCategory->update([
            'Nosaukums' => $request->Kat_Nosaukums,
            'Apraksts' => $request->Apraksts,
            'Apakskategorija' => $request->Apakskategorija,
        ]);

        return redirect()->route('sound-categories.index')->with('success', __('translation.scUpdate'));
    }

    // Function to delete a category
    public function destroy(Skana_kategorija $SoundCategory)
    {
        $SoundCategory->delete();

        return redirect()->route('sound-categories.index')->with('success', __('translation.scDelete'));
    }
}