<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zanrs;

class GenreController extends Controller
{
        // Method to list all categories MAIN DISPLAY
        public function index()
        {
            $genre = Zanrs::all();
            $genre = Zanrs::with('parent')->get();
        
            return view('genre.index', compact('genre'));
        }
    // Method to display the form for creating a new category
    public function create()
    {
        $genre = Zanrs::all();
        return view('genre.create', compact('genre'));
    }

    // Method to store the newly created category
    public function store(Request $request)
    {
        $request->validate([
            'Nosaukums' => 'required|string',
            'Apraksts' => 'nullable|string',
            'Apakszanrs' => 'nullable|exists:zanrs,Z_ID'
        ]);

        Zanrs::create([
            'Nosaukums' => $request->Nosaukums,
            'Apraksts' => $request->Apraksts, 
            'Apakszanrs' => $request->Apakszanrs,
        ]);

        return redirect()->route('genre.index')->with('success', 'Genre created successfully.');
    }

    // Method to display a form for editing a category
    public function edit(Zanrs $genre)
    {
        $allGenre = Zanrs::all(); 
        return view('genre.edit', compact('genre', 'allGenre'));
    }
    

    // Method to update the edited category
    public function update(Request $request, Zanrs $genre)
    {
        $request->validate([
            'Nosaukums' => 'required|string',
            'Apraksts' => 'nullable|string',
            'Apakszanrs' => 'nullable|exists:zanrs,Z_ID'
        ]);

        $genre->update([
            'Nosaukums' => $request->Nosaukums,
            'Apraksts' => $request->Apraksts,
            'Apakszanrs' => $request->Apakszanrs,
        ]);

        return redirect()->route('genre.index')->with('success', 'Genre updated successfully.');
    }

    // Method to delete a category
    public function destroy(Zanrs $genre)
    {
        $genre->delete();

        return redirect()->route('genre.index')->with('success', 'Genre deleted successfully.');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}