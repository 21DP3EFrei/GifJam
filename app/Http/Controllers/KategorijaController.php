<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategorija;

class KategorijaController extends Controller
{
    // Method to display the form for creating a new category
    public function create()
    {
        return view('categories.create');
    }

    // Method to store the newly created category
    public function store(Request $request)
    {
        $request->validate([
            'Nosaukums' => 'required|string',
            'Apraksts' => 'nullable|string',
        ]);

        Kategorija::create([
            'Nosaukums' => $request->Nosaukums,
            'Apraksts' => $request->Apraksts,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    // Method to display a form for editing a category
    public function edit(Kategorija $kategorija)
    {
        return view('categories.edit', compact('kategorija'));
    }

    // Method to update the edited category
    public function update(Request $request, Kategorija $kategorija)
    {
        $request->validate([
            'Nosaukums' => 'required|string',
            'Apraksts' => 'nullable|string',
        ]);

        $kategorija->update([
            'Nosaukums' => $request->Nosaukums,
            'Apraksts' => $request->Apraksts,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    // Method to delete a category
    public function destroy(Kategorija $kategorija)
    {
        $kategorija->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }

    // Method to list all categories
    public function index()
{
    $categories = Kategorija::all();
    return view('categories.index', compact('categories'));
}

    // Method to display details of a specific category
    public function show(Kategorija $kategorija)
    {
        return view('categories.show', compact('kategorija'));
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
}
