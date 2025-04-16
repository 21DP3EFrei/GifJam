<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skana_kategorija;
use App\Models\Media;
use App\Models\Skana; 

class SoundLibrary extends Controller
{
    public function index(Request $request)
    {
        // Fetch categories and subcategories
        $categories = Skana_kategorija::whereNull('Apakskategorija')->get();
        $subcategories = Skana_kategorija::whereNotNull('Apakskategorija')->get();
    
        // Initialize query for media
        $query = Media::where('Status', 1)->where('Multivides_tips', 'Sound');
    
        // Apply filters (category, subcategory, search, sort_by)
        if ($request->filled('sound_category_id')) {
            $categoryId = $request->sound_category_id;
            $allSubCategoryIds = $this->getSubcategoryIds($categoryId);
            array_unshift($allSubCategoryIds, $categoryId);
    
            // Filter media based on Skana's categories
            $query->whereHas('skana.skanaKategorija', function ($q) use ($allSubCategoryIds) {
                $q->whereIn('SKat_ID', $allSubCategoryIds);
            });
        }
    
        if ($request->filled('subcategory_id') && $request->subcategory_id) {
            // Filter media based on Skana's subcategories
            $query->whereHas('skana.skanaKategorija', function ($q) use ($request) {
                $q->where('SKat_ID', $request->subcategory_id);
            });
        }
    
        if ($request->filled('search')) {
            $query->where('Nosaukums', 'like', '%' . $request->input('search') . '%');
        }
    
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
                $query->orderBy('Me_ID');
                break;
            default:
                $query->orderByDesc('Me_ID');
                break;
        }
    
        $sound = $query->get();
    
        // Check if the request is via AJAX
        if ($request->ajax()) {
            return response()->json(['success' => true, 'data' => view('sounds.media', compact('sound'))->render()])
                ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
                ->header('Pragma', 'no-cache')
                ->header('Expires', '0');
        }
    
        // Return the full view for non-AJAX requests
        return view('sounds.index', compact('categories', 'subcategories', 'sound'));
    }

    // Recursive method to get all subcategory IDs, including nested subcategories
    public function getSubcategoryIds($categoryId)
    {
        // Get the direct subcategories of the selected category
        $subcategories = Skana_kategorija::where('Apakskategorija', $categoryId)->get();
        
        $allSubCategoryIds = $subcategories->pluck('SKat_ID')->toArray();
        
        // For each subcategory, get its own subcategories (nested recursion)
        foreach ($subcategories as $subcategory) {
            // Merge nested subcategories
            $allSubCategoryIds = array_merge($allSubCategoryIds, $this->getSubcategoryIds($subcategory->SKat_ID));
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
            $subcategories = Skana_kategorija::whereIn('SKat_ID', $allSubCategoryIds)->get(['SKat_ID', 'Nosaukums']);
    
            return response()->json(['success' => true, 'data' => $subcategories]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => __('translation.noData')]);
        }
    }
    
    public function show(Media $media)
    {
        $sound = Skana::where('Medija', $media->Me_ID)->first();
        return view('sounds.show', compact('media', 'sound'));
    }

    public function download(Media $media)
    {

        $filePath = storage_path('app/public/' . $media->Fails);
        $newFileName = $media->Nosaukums . '.' . pathinfo($media->Fails, PATHINFO_EXTENSION);
    
        return response()->download($filePath, $newFileName);
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
}
