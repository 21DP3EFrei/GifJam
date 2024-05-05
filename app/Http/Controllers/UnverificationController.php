<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mem;

class UnverificationController extends Controller
{
    public function index()
    {
        $approvedMems = Mem::where('Status', 1)->get();
        return view('unverification.index', compact('approvedMems'));
    }
    
    public function unverify(Request $request, Mem $mem)
    {
        // Validate the request
        $request->validate([
            'status' => 'required|boolean', // Status should be either true (unapproved) or false (remain approved)
        ]);

        // Update the status of the specified file
        $mem->update([
            'Status' => $request->status ? 0 : 1, // Convert boolean value to integer (0 for unapproved, 1 for remain approved)
        ]);

        // Redirect back to the unverification index page with a success message
        return redirect()->route('unverification.index')->with('success', 'File unverification status updated successfully.');
    }
}
