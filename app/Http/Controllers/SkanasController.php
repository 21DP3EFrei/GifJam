<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;
use App\Models\Skana;
use App\Models\Skana_kategorija;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class SkanasController extends Controller
{
        public function upload()
        {
            $soundCategories = Skana_Kategorija::all();
            return view('uploadSound', compact('soundCategories'));
        }
        public function uploadPost(Request $request)
        {
            // Validate the request
            $request->validate([
                'fileName' => 'required|string',
                'fileDescription' => 'nullable|string',
                'author' => 'required|string',
                'copyright' => 'required|string|in:Yes,No',
                'category_id' => 'required|exists:skanas_kategorija,SKat_ID', // Ensure the selected category exists
                'uploadFile' => 'required|mimes:aac,aiff,alac,m4a,flac,mp3,wav,opus|max:20000',
            ], [
                'uploadFile.mimes' => 'Only sound files are allowed.',
            ]);

            // Store the uploaded sound file
            $sound = $request->file('uploadFile');
            $fileName = $sound->getClientOriginalName(); // Get the original filename
            $filePath = $sound->storeAs('uploads', $fileName, 'public'); // Store the file in the public disk

            // Create a new Media instance and save it to the database
            $media = new Media();
            $media->Nosaukums = $request->fileName;
            $media->Apraksts = $request->fileDescription;
            $media->Fails = $filePath; // Store the file path in the database
            $media->Autors = $request->author;
            $media->Autortiesibas = ($request->copyright == 'Yes') ? 1 : 0;
            $media->Status = 0; // Set the default status to unpublished
            $media->Lietotajs = Auth::id();
            $media->Multivides_tips = 'Sound'; // Assuming this is always "Sound" for this controller
            $media->save();

            // Create a new Skana instance and associate it with the Media instance
            $skana = new Skana();
            $skana->Medija = $media->Me_ID; // Associate the Media ID with the Skana instance
            $skana->save();

            // Attach the selected category to the Skana instance
            $categoryId = $request->category_id;
            $skana->skanaKategorija()->attach($categoryId);

            // Return a success message
            return back()->with('success', 'File uploaded successfully and awaiting review.');
        }
        public function verify(Request $request, Media $media)
    {
            $request->validate([
            'status' => 'required|boolean',
        ]);

        $media->update([
            'Status' => $request->status ? 1 : 0,
        ]);
    
        
        // Redirect back to the verification index page with a success message
        return Redirect::route('verification.index')->with('success', 'File verification status updated successfully.');
    }
    public function __construct()
        {
            $this->middleware('auth');
        }
}

