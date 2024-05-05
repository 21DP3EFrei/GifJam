<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategorija;
use App\Models\Subcategory;
use App\Models\Mem;
use Illuminate\Database\Eloquent\Builder;

class PictureController extends Controller
{
    public function index(Request $request)
    {
        // Fetch all categories
        $categories = Kategorija::all();
        
        // Initialize an empty array for pictures
        $pictures = [];

        // Check if a category is selected
        if ($request->has('category_id')) {
            // Fetch the selected category
            $category = Kategorija::findOrFail($request->category_id);
            
            // Fetch pictures associated with the selected category
            $pictures = Mem::where('Kategorija_ID', $category->K_ID)->get();
        }

        // Return the view with the categories and pictures
        return view('pictures.index', compact('categories', 'pictures'));
    }
    public function show(Mem $mem)
{
    return view('pictures.show', compact('mem'));
}
public function download(Mem $mem)
{
    return response()->download(storage_path('app/public/' . $mem->Attels));
}

}
