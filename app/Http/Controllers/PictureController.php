<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategorija;
use App\Models\Subcategory;
use App\Models\Mem;

class PictureController extends Controller
{
 // PictureController.php

// PictureController.php

public function index(Request $request)
{
    // Fetch all categories and subcategories
    $categories = Kategorija::all();
    $subcategories = Subcategory::all();
    
    // Initialize query for pictures
    $query = Mem::where('Status', 1); // Ensure only verified pictures are fetched

    // Apply category filter if selected
    if ($request->filled('category_id')) {
        $query->where('Kategorija_ID', $request->category_id);
    }

    // Apply subcategory filter if selected
    if ($request->filled('subcategory_id')) {
        $query->where('Apakskategorija_ID', $request->subcategory_id);
    }

    // Apply search filter if search term is provided
    if ($request->filled('search')) {
        $searchTerm = $request->input('search');
        $query->where('Nosaukums', 'like', '%' . $searchTerm . '%');
    }

    // Apply sorting based on the selected option
    switch ($request->sort_by) {
        case 'newest':
            $query->orderByDesc('M_ID');
            break;
        case 'name_az':
            $query->orderBy('Nosaukums');
            break;
        case 'author':
            $query->orderBy('Autors');
            break;
        case 'oldest':
        default:
            $query->orderBy('M_ID');
            break;
    }

    // Fetch the filtered and sorted pictures
    $pictures = $query->get();

    // Return the view with the categories, subcategories, and pictures
    return view('pictures.index', compact('categories', 'subcategories', 'pictures'));
}
public function show(Mem $mem)
{
    return view('pictures.show', compact('mem'));
}

}