<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Kategorija;

class KategorijaController extends Controller
{
        // Method to list all categories MAIN DISPLAY
        public function index()
        {
            $categories = Kategorija::all();
            $categories = Kategorija::with('parent')->get();
        
            return view('categories.index', compact('categories'));
        }
    // Method to display the form for creating a new category
    public function create()
    {
        $categories = Kategorija::all();
        return view('categories.create', compact('categories'));
    }

    // Method to store the newly created category
    public function store(Request $request)
    {
        $request->validate([
            'Nosaukums' => 'required|string',
            'Apraksts' => 'nullable|string',
            'Apakskategorija' => 'nullable|exists:kategorija,K_ID'
        ]);

        Kategorija::create([
            'Nosaukums' => $request->Nosaukums,
            'Apraksts' => $request->Apraksts, 
            'Apakskategorija' => $request->Apakskategorija,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    // Method to display a form for editing a category
    public function edit(Kategorija $categories)
    {
        $allCategories = Kategorija::all(); 
        return view('categories.edit', compact('categories', 'allCategories'));
    }
    

    // Method to update the edited category
    public function update(Request $request, Kategorija $categories)
    {
        $request->validate([
            'Nosaukums' => 'required|string',
            'Apraksts' => 'nullable|string',
            'Apakskategorija' => 'nullable|exists:kategorija,K_ID'
        ]);

        $categories->update([
            'Nosaukums' => $request->Nosaukums,
            'Apraksts' => $request->Apraksts,
            'Apakskategorija' => $request->Apakskategorija,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    // Method to delete a category
    public function destroy(Kategorija $categories)
    {
        $categories->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
