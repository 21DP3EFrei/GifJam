<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zanrs;

class GenreController extends Controller
{
    // Page that displays all genres
    public function index()
    {
        $genre = Zanrs::all();
        $genre = Zanrs::with('parent')->get();
    
        return view('genre.index', compact('genre'));
    }
    // Function to display the form for creating a new genre
    public function create()
    {
        $genre = Zanrs::all();
        return view('genre.create', compact('genre'));
    }

    // Function to store the newly created genre
    public function store(Request $request)
    {
        $request->validate([
            'G_Nosaukums' => 'required|string|max:100',
            'Apraksts' => 'nullable|string|max:300',
            'Apakszanrs' => 'nullable|exists:zanrs,Z_ID'
        ]);

        Zanrs::create([
            'Nosaukums' => $request->G_Nosaukums,
            'Apraksts' => $request->Apraksts, 
            'Apakszanrs' => $request->Apakszanrs,
        ]);

        return redirect()->route('genre.index')->with('success', __('translation.genreCreate'));
    }

    // Function to display a form for editing a genre
    public function edit(Zanrs $genre)
    {
        $allGenre = Zanrs::all(); 
        return view('genre.edit', compact('genre', 'allGenre'));
    }

    // Function to update the edited genre
    public function update(Request $request, Zanrs $genre)
    {
        $request->validate([
            'G_Nosaukums' => 'required|string|max:100',
            'Apraksts' => 'nullable|string|max:300',
            'Apakszanrs' => 'nullable|exists:zanrs,Z_ID'
        ]);

        $genre->update([
            'Nosaukums' => $request->G_Nosaukums,
            'Apraksts' => $request->Apraksts,
            'Apakszanrs' => $request->Apakszanrs,
        ]);

        return redirect()->route('genre.index')->with('success', __('translation.genreUpdate'));
    }

    // Function to delete a genre
    public function destroy(Zanrs $genre)
    {
        $genre->delete();

        return redirect()->route('genre.index')->with('success', __('translation.genreDelete'));
    }
}