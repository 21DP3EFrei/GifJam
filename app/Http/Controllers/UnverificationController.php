<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;

class UnverificationController extends Controller
{
    public function index()
    {
        $approvedMedia = Media::where('Status', 1)->get();
        return view('unverification.index', compact('approvedMedia'));
    }
    
    public function unverify(Request $request, Media $media)
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
    public function __construct()
    {
        $this->middleware('auth');
    }
}
