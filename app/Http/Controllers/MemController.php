<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mem;
use Illuminate\Http\Response;
use App\Models\Kategorija;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class MemController extends Controller
{
    public function index()
    {
        $mems = Mem::all();
        return view('mem.index', compact('mems'));
    }
    public function upload()
    {
        $categories = Kategorija::all();
        return view('upload', compact('categories'));
    }
    public function uploadPost(Request $request)
    {
        Log::info('Upload Post method started.');
        $request->validate([
            'fileName' => 'required|string',
            'fileDescription' => 'nullable|string',
            'author' => 'required|string',
            'copyright' => 'required|string|in:Yes,No',
            'category_id' => 'required|exists:kategorija,K_ID', // Ensure the selected category exists
            'subcategory_id' => 'required|exists:apakskategorija,id', // Ensure the selected subcategory exists
            'uploadFile' => 'required|image|mimes:png,jpeg,webp,gif|max:100000', // Validate uploaded image with specific formats
        ]);
    
        // Store the uploaded image file
        $image = $request->file('uploadFile');
        $fileName = $image->getClientOriginalName(); // Get the original filename
        $filePath = $request->file('uploadFile')->storeAs('uploads', $fileName, 'public');
    
        // Create a new Mem instance and save it to the database
        $mem = new Mem();
        $mem->Nosaukums = $request->fileName;
        $mem->Apraksts = $request->fileDescription;
        $mem->Attels = $filePath; // Store the file path in the database instead of the actual file content
        $mem->Autors = $request->author;
        $mem->Autortiesibas = ($request->copyright == 'Yes') ? 1 : 0;
        $mem->Status = 0; // Set the default status to unpublished
        $mem->Kategorija_ID = $request->category_id;
        $mem->Apakskategorija_ID = $request->subcategory_id; // Assign the selected subcategory
        $mem->save();
    
        // Return a success message
        return back()->with('success', 'File uploaded successfully and awaiting review.');
    }
    public function verify(Request $request, Mem $mem)
{
    // Validate the request
    $request->validate([
        'status' => 'required|boolean', // Status should be either true (approved) or false (rejected)
    ]);

    // Update the status of the specified file
    $mem->update([
        'Status' => $request->status ? 1 : 0, // Convert boolean value to integer (1 for approved, 0 for rejected)
    ]);

    // Redirect back to the verification index page with a success message
    return Redirect::route('verification.index')->with('success', 'File verification status updated successfully.');
}
public function __construct()
    {
        $this->middleware('auth');
    }

}