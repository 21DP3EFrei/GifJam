<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Kategorija;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Mime\MimeTypes;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function index()
    {
        $medias = Media::all();
        return view('media.index', compact('media'));
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
            'uploadFile' => 'required|mimes:png,jpeg,webp,gif,jpg|max:20000',
        ], [
            'uploadFile.mimes' => 'Only image and GIF files are allowed.',
        ]);

        // Store the uploaded image file
        $image = $request->file('uploadFile');
        $fileName = $image->getClientOriginalName(); // Get the original filename
        $filePath = $request->file('uploadFile')->storeAs('uploads', $fileName, 'public');
    
        // Create a new media instance and save it to the database
        $media = new Media();
        $media->Nosaukums = $request->fileName;
        $media->Apraksts = $request->fileDescription;
        $media->Fails = $filePath; // Store the file path in the database instead of the actual file content
        $media->Autors = $request->author;
        $media->Autortiesibas = ($request->copyright == 'Yes') ? 1 : 0;
        $media->Status = 0; // Set the default status to unpublished
        $media->Lietotajs = Auth::id();
        $media->Multivides_tips = $request->input('Multivides_tips');
        $media->save();

        $categories = $request->category_id;
        $media->kategorijas()->attach($categories);
    
        // Return a success message
        return back()->with('success', 'File uploaded successfully and awaiting review.');
    }
    public function verify(Request $request, Media $media)
{
    $categories = Kategorija::all();
    

    // Validate the request
    $request->validate([
        'status' => 'required|boolean', // Status should be either true (approved) or false (rejected)
    ]);

    // Update the status of the specified file
    $media->update([
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