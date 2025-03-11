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
            'subcategory_id' => 'nullable|exists:subcategories,id', // Validate the selected subcategory exists
        ]);

        if ($request->status) {
            // Approve the media
            $media->update([
                'Status' => 1, // Set status to approved
                'subcategory_id' => $request->subcategory_id, // Assign the selected subcategory
            ]);
        } else {
            // Delete the meme if rejected
            $media->delete();
        }

        // Redirect back to the verification index page with a success message
        return redirect()->route('verification.index')->with('success', 'File verification status updated successfully.');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
