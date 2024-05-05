<?php

// app/Http/Controllers/VerificationController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mem;
use App\Models\Kategorija;
use App\Models\Subcategory;

class VerificationController extends Controller
{
    public function index()
    {
        $unverifiedMems = Mem::where('Status', 0)->get();
        $subcategories = Subcategory::all(); // Fetch all subcategories
        return view('verification.index', compact('unverifiedMems', 'subcategories')); // Pass subcategories to the view
    }
    
    public function verify(Request $request, Mem $mem)
    {
        // Validate the request
        $request->validate([
            'status' => 'required|boolean', // Status should be either true (approved) or false (rejected)
            'subcategory_id' => 'nullable|exists:subcategories,id', // Validate the selected subcategory exists
        ]);
    
        // Update the status and subcategory of the specified file
        $mem->update([
            'Status' => $request->status ? 1 : 0, // Convert boolean value to integer (1 for approved, 0 for rejected)
            'subcategory_id' => $request->subcategory_id, // Assign the selected subcategory to the picture
        ]);
    
        // Redirect back to the verification index page with a success message
        return redirect()->route('verification.index')->with('success', 'File verification status updated successfully.');
    }
 }