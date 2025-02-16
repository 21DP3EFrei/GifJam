<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategorija;
use App\Models\Media; 
use Illuminate\Support\Facades\Storage; 

class PictureController extends Controller
{
    public function index(Request $request)
    {
        // Fetch all categories (parent categories only)
        $categories = Kategorija::whereNull('Apakskategorija')->get();
        
        // Fetch subcategories based on the selected category
        $subcategories = Kategorija::whereNotNull('Apakskategorija')->get();
        
        // Initialize query for media
        $query = Media::where('Status', 1); // Ensure only verified media is fetched
        
        // If a category is selected, fetch the category and its subcategories
        if ($request->filled('category_id')) {
            // Get the selected category ID
            $categoryId = $request->category_id;
            
            // Recursively get all subcategories (including nested subcategories)
            $allSubCategoryIds = $this->getSubcategoryIds($categoryId);
            
            // Include the selected category itself in the filter
            array_unshift($allSubCategoryIds, $categoryId);
            
            // Filter query by the selected category and its subcategories
            $query->whereHas('kategorijas', function ($q) use ($allSubCategoryIds) {
                $q->whereIn('K_ID', $allSubCategoryIds); // Only keeps media where the category ID is in this list of IDs.
            });
        }
        
        // If a subcategory is selected, filter by that subcategory only
        if ($request->has('subcategory_id') && $request->subcategory_id) {
            $query->whereHas('kategorijas', function ($q) use ($request) {
                $q->where('K_ID', $request->subcategory_id);
            });
        }
        
        // Apply search filter if search term is provided
        if ($request->filled('search')) {
            $searchTerm = $request->input('search');
            $query->where('Nosaukums', 'like', '%' . $searchTerm . '%');
        }
        
        // Apply sorting based on the selected option
        switch ($request->sort_by) {
            case 'newest':
                $query->orderByDesc('Me_ID');
                break;
            case 'name_az':
                $query->orderBy('Nosaukums');
                break;
            case 'author':
                $query->orderBy('Autors');
                break;
            case 'oldest':
            default:
                $query->orderBy('Me_ID');
                break;
        }
        
        // Fetch the filtered and sorted media
        $pictures = $query->get();
        // Return the view with the categories, subcategories, and pictures
        return view('pictures.index', compact('categories', 'subcategories', 'pictures'));
        
    }
    
    
    // Recursive method to get all subcategory IDs, including nested subcategories
    public function getSubcategoryIds($categoryId)
    {
        // Get the direct subcategories of the selected category
        $subcategories = Kategorija::where('Apakskategorija', $categoryId)->get();
        
        $allSubCategoryIds = $subcategories->pluck('K_ID')->toArray();
        
        // For each subcategory, get its own subcategories (nested recursion)
        foreach ($subcategories as $subcategory) {
            $allSubCategoryIds = array_merge($allSubCategoryIds, $this->getSubcategoryIds($subcategory->K_ID));
        }
        
        return $allSubCategoryIds;
    }
    

    public function show(Media $media)
    {
        return view('pictures.show', compact('media'));
    }

    public function download(Media $media)
    {
        return response()->download(storage_path('app/public/' . $media->Fails));
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
}
