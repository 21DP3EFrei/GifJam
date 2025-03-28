<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;
use App\Models\Kategorija;
use App\Models\Subcategory;

class VerificationController extends Controller
{
    public function index()
    {
        $unverifiedMems = Media::where('Status', 0)->get();
        $subcategories = Subcategory::all(); // Fetch all subcategories
        return view('verification.index', compact('unverifiedMems', 'subcategories')); // Pass subcategories to the view
    }
    
    public function mediaverify(Request $request, Media $media)
    {
        // Validate the request
        $request->validate([
            'status' => 'required|boolean', // Status should be either true (approved) or false (rejected)
        ]);

        if ($request->status) {
            // Approve the media
            $media->update([
                'Status' => 1, // Set status to approved
            ]);
        } else {
            // Delete the meme if rejected
            $media->delete();
        }

        // Redirect back to the verification index page with a success message
        return redirect()->route('verification.index')->with('success', 'File verification status updated successfully.');
    }

    public function editMedia(Request $request, Media $media)
    {
        $allMedia = Media::all(); 
        $categories = Kategorija::all();
        return view('verification.edit', compact('media', 'allMedia', 'categories'));
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
    
        return redirect()->route('verification.index')->with('success', 'Media updated successfully.');
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
}
