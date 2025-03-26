<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;
use App\Models\Kategorija;

class UnverificationController extends Controller
{
    public function index(Request $request)
    {
        $query = Media::where('Status', 1);
    
        // Apply search filter if the 'search' parameter is present
        if ($request->filled('search')) {
            $query->where('Nosaukums', 'like', '%' . $request->input('search') . '%');
        }
    
        $approvedMedia = $query->get();
    
        // Check if the request is via AJAX
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'data' => view('unverification.media', compact('approvedMedia'))->render(),
            ]);
        }
    
        return view('unverification.index', compact('approvedMedia'));
    }
    
    public function mediaunverify(Request $request, Media $media)
    {
        // Validate the request
        $request->validate([
            'status' => 'required|boolean', // Status should be either true (unapproved) or false (remain approved)
        ]);

        // Update the status of the specified file
        $media->update([
            'Status' => $request->status ? 0 : 1, // Convert boolean value to integer (0 for unapproved, 1 for remain approved)
        ]);

        // Redirect back to the unverification index page with a success message
        return redirect()->route('unverification.index')->with('success', 'File unverification status updated successfully.');
    }

    public function editMedia(Request $request, Media $media)
    {
        $allMedia = Media::all(); 
        $categories = Kategorija::all();
        return view('unverification.edit', compact('media', 'allMedia', 'categories'));
    }
    public function update(Request $request, Media $media)
    {
        // Validate the request data
        $request->validate([
            'Nosaukums' => 'required|string',
            'Apraksts' => 'nullable|string',
            'Autors' => 'required|string',
            'Autortiesibas' => 'required|in:0,1', // Ensure the value is either 0 or 1
            'Kategorija_id' => 'required|exists:kategorija,K_ID', // Ensure the selected category exists
        ]);
    
        // Update the media record
        $media->update([
            'Nosaukums' => $request->Nosaukums,
            'Apraksts' => $request->Apraksts,
            'Autors' => $request->Autors,
            'Autortiesibas' => $request->Autortiesibas, // Directly use the value (0 or 1)
        ]);
    
        // Sync the selected categories with the media
        $categories = $request->Kategorija_id; // Use the correct field name from the request
        $media->kategorijas()->sync($categories); // Use sync() to avoid duplicates
    
        return redirect()->route('unverification.index')->with('success', 'Media updated successfully.');
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
}
