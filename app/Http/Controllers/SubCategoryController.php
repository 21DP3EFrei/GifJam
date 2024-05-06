<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory; // Import the Subcategory model
use App\Models\Kategorija;
use App\Models\Mem;
class SubcategoryController extends Controller
{
    public function index()
{
    $unverifiedMems = Mem::where('Status', 0)->get(); // Retrieve unverified mems

    // Fetch all subcategories with their related categories
    $subcategories = Subcategory::with('kategorija')->get();

    return view('subcategories.index', compact('unverifiedMems', 'subcategories'));
}

    
    public function create()
    {
        $categories = Kategorija::all();
        return view('subcategories.create', compact('categories'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nosaukums' => 'required|string',
            'Apraksts' => 'nullable|string',
            'kategorija_id' => 'required|exists:kategorija,K_ID' // Adjusted validation rule to check against 'kategorija' table and 'K_ID' column
        ]);
        
        Subcategory::create([
            'Nosaukums' => $request->Nosaukums,
            'Apraksts' => $request->Apraksts,
            'kategorija_id' => $request->kategorija_id,
        ]);
    
        return redirect()->route('subcategories.index')->with('success', 'Subcategory created successfully.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $subcategory = Subcategory::with('kategorija')->findOrFail($id);
    return view('subcategories.show', compact('subcategory'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $subcategory = Subcategory::findOrFail($id);
    $categories = Kategorija::all();
    return view('subcategories.edit', compact('subcategory', 'categories'));
}


    /**
     * Update the specified resource in storage.
     */public function update(Request $request, $id)
{
    $request->validate([
        'Nosaukums' => 'required|string',
        'Apraksts' => 'nullable|string',
        'kategorija_id' => 'required|exists:kategorija,K_ID' // Corrected table name to 'kategorija'
    ]);

    $subcategory = Subcategory::findOrFail($id); // Retrieve the specified subcategory

    $subcategory->update([
        'Nosaukums' => $request->Nosaukums,
        'Apraksts' => $request->Apraksts,
        'kategorija_id' => $request->kategorija_id,
    ]);

    // Optionally, redirect the user after successful update
    return redirect()->route('subcategories.index')->with('success', 'Subcategory updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $subcategory = Subcategory::findOrFail($id); // Retrieve the specified subcategory
        $subcategory->delete(); // Delete the subcategory
        return redirect()->route('subcategories.index')->with('success', 'Subcategory deleted successfully.');
    }
    public function getSubcategories($categoryId)
{
    $category = Kategorija::find($categoryId);
    
    if (!$category) {
        return response()->json(['error' => 'Category not found'], 404);
    }

    $subcategories = $category->subcategories()->get(['id', 'Nosaukums as name']);
    
    return response()->json($subcategories);
}
}
