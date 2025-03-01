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
        $categories = Kategorija::whereNull('Apakskategorija')->get();
        $subcategories = Kategorija::whereNotNull('Apakskategorija')->get();
        
        // Initialize query for media
        $query = Media::where('Status', 1); // Ensure only verified media is fetched
    
        // Handle category and subcategory filters
        if ($request->filled('category_id')) {
            $categoryId = $request->category_id;
            $allSubCategoryIds = $this->getSubcategoryIds($categoryId);
            array_unshift($allSubCategoryIds, $categoryId);
    
            $query->whereHas('kategorijas', function ($q) use ($allSubCategoryIds) {
                $q->whereIn('K_ID', $allSubCategoryIds);
            });
        }
    
        if ($request->filled('subcategory_id') && $request->subcategory_id) {
            $query->whereHas('kategorijas', function ($q) use ($request) {
                $q->where('K_ID', $request->subcategory_id);
            });
        }
    
        // Apply search filter if search term is provided
        if ($request->filled('search')) {
            $query->where('Nosaukums', 'like', '%' . $request->input('search') . '%');
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
    
        // If the request is via AJAX, return only the media section (partial view)
        if ($request->ajax()) {
            return response()->json(['success' => true, 'data' => view('pictures.media', compact('pictures'))->render()]);
        }
    
        // Return the full view
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
            // Merge nested subcategories
            $allSubCategoryIds = array_merge($allSubCategoryIds, $this->getSubcategoryIds($subcategory->K_ID));
        }
        
        return $allSubCategoryIds;
    }    
    
    // Function to update subcategories
    public function getSubcategories($categoryId)
    {
        try {
            // Get all subcategories (including nested) associated with the selected category
            $allSubCategoryIds = $this->getSubcategoryIds($categoryId);
    
            // Fetch the subcategory details using the IDs obtained
            // You can choose to return both the category and subcategories in the response.
            $subcategories = Kategorija::whereIn('K_ID', $allSubCategoryIds)->get(['K_ID', 'Nosaukums']);
    
            return response()->json(['success' => true, 'data' => $subcategories]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => 'No data']);
        }
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
