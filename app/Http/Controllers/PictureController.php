<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategorija;
use App\Models\Media; 
use Illuminate\Support\Facades\Storage; // This line is already correct

class PictureController extends Controller
{
    public function index(Request $request)
    {
        // Fetch all categories and subcategories
        $categories = Kategorija::all();

        // Initialize query for pictures
        $query = Media::where('Status', 1); // Ensure only verified pictures are fetched

        // Apply category filter if selected
        if ($request->filled('category_id')) {
            $query->where('Kategorija_ID', $request->category_id);
        }

        // // Apply subcategory filter if selected
        // if ($request->filled('subcategory_id')) {
        //     $query->where('Apakskategorija_ID', $request->subcategory_id);
        // }

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

        // Fetch the filtered and sorted pictures
        $pictures = $query->get();

        // Return the view with the categories, subcategories, and pictures
        return view('pictures.index', compact('categories', 'pictures'));
    }

    public function show(Media $media)
    {
        return view('pictures.show', compact('Media'));
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
