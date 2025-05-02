<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Music;
use App\Models\Zanrs;
use App\Models\Media; 

class MusicLibrary extends Controller
{
    public function index(Request $request)
    {
        // Fetch genres and subgenres
        $genres = Zanrs::whereNull('Apakszanrs')->get();
        $subgenres = Zanrs::whereNotNull('Apakszanrs')->get();
    
        // Initialize query for media
        $query = Media::where('Status', 1 )->where('Multivides_tips', 'Music'); 
        // Apply filters (genre, subgenre, search, sort_by)
        if ($request->filled('genre_id')) {
            $genreId = $request->genre_id;
            $allSubGenreIds = $this->getSubgenreIds($genreId);
            array_unshift($allSubGenreIds, $genreId);
    
            $query->whereHas('music.zanrs', function ($q) use ($allSubGenreIds) {
                $q->whereIn('Z_ID', $allSubGenreIds);
            });
        }
    
        if ($request->filled('subgenre_id') && $request->subgenre_id) {
            $query->whereHas('music.zanrs', function ($q) use ($request) {
                $q->where('Z_ID', $request->subgenre_id);
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
            case 'yearUp':
                $query->join('muzika', 'medija.Me_ID', '=', 'muzika.Medija')
                        ->orderBy('muzika.Izlaists', 'asc');
                break; 
            case 'yearDown':
                $query->join('muzika', 'medija.Me_ID', '=', 'muzika.Medija')
                        ->orderBy('muzika.Izlaists', 'desc');
                break;
            default:
                $query->orderByDesc('Me_ID');
                break;
        }
    
        $music = $query->get();
    
        // Check if the request is via AJAX
        if ($request->ajax()) {
            return response()->json(['success' => true, 'data' => view('music.media', compact('music'))->render()])
                ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
                ->header('Pragma', 'no-cache')
                ->header('Expires', '0');
        }
    
        // Return the full view for non-AJAX requests
        return view('music.index', compact('genres', 'subgenres', 'music'));
    }
    // Recursive method to get all subgenre IDs, including nested subgenres
    public function getSubgenreIds($genreId)
    {
        // Get the direct subgenres of the selected genre
        $subgenres = Zanrs::where('Apakszanrs', $genreId)->get();
        
        $allSubGenreIds = $subgenres->pluck('Z_ID')->toArray();
        
        // For each subgenre, get its own subgenres (nested recursion)
        foreach ($subgenres as $subgenre) {
            // Merge nested subgenres
            $allSubGenreIds = array_merge($allSubGenreIds, $this->getSubgenreIds($subgenre->Z_ID));
        }
        
        return $allSubGenreIds;
    }    
    
    // Function to update subgenres
    public function getSubgenres($genreId)
    {
        try {
            // Get all subgenres (including nested) associated with the selected genre
            $allSubGenreIds = $this->getSubgenreIds($genreId);
    
            // Fetch the subgenre details using the IDs obtained
            // You can choose to return both the genre and subgenres in the response.
            $subgenres = Zanrs::whereIn('Z_ID', $allSubGenreIds)->get(['Z_ID', 'Nosaukums']);
    
            return response()->json(['success' => true, 'data' => $subgenres]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => __('translation.noData')]);
        }
    }
    
    public function __construct()
    {
        $this->middleware('auth');
    }
}
