<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use App\Models\Kategorija;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class MediaController extends Controller
{
    public function upload()
    {
        $categories = Kategorija::all();
        return view('upload', compact('categories'));
    }
    public function uploadPost(Request $request)
    {
        $request->validate([
            'fileName' => 'required|string|max:100',
            'fileDescription' => 'nullable|string|max:200',
            'author' => 'required|string|max:100',
            'copyright' => 'required|string|in:Yes,No',
            'category_id' => 'required|exists:kategorija,K_ID', // Ensure the selected category exists
            'uploadFile' => 'required|mimes:png,jpeg,webp,gif,jpg|max:20000',
        ], [
            'uploadFile.mimes' => __('translation.uploadImage'),
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
        $media->Multivides_tips = 'Image';
        $media->save();

        $categories = $request->category_id;
        $media->kategorijas()->attach($categories);
    
        // Return a success message
        return back()->with('success', __('translation.fileUploaded'));
    }
public function __construct()
    {
        $this->middleware('auth');
    }
}