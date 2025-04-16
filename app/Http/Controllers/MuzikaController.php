<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;
use App\Models\Music;
use App\Models\Zanrs;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class MuzikaController extends Controller
{
        public function upload()
        {
            $genre = Zanrs::all();
            return view('uploadMusic', compact('genre'));
        }
        public function uploadPost(Request $request)
        {
            // Validate the request
            $request->validate([
                'fileName' => 'required|string|max:100',
                'fileDescription' => 'nullable|string|max:200',
                'author' => 'required|string|max:100',
                'copyright' => 'required|string|in:Yes,No',
                'category_id' => 'required|exists:zanrs,Z_ID', // Ensure the selected category exists
                'uploadFile' => 'required|mimes:aac,aiff,alac,m4a,flac,mp3,wav,opus|max:20000',
            ], [
                'uploadFile.mimes' => __('translation.uploadSound'),
            ]);
        
            // Initialize the uploaded file
            $musicFile = $request->file('uploadFile');
        
            // Analyze the file metadata using getID3
            $getID3 = new \getID3;
            $fileInfo = $getID3->analyze($musicFile->getPathname());
        
            // Extract the year from metadata
            $year = $fileInfo['tags']['id3v2']['year'][0] ?? null; // Default to null if year is not found
            $bitrate = $fileInfo['audio']['bitrate'] ?? null;
        
            // Store the uploaded sound file
            $fileName = $musicFile->getClientOriginalName(); // Get the original filename
            $filePath = $musicFile->storeAs('uploads', $fileName, 'public'); // Store the file in the public disk
        
            // Create a new Media instance and save it to the database
            $media = new Media();
            $media->Nosaukums = $request->fileName;
            $media->Apraksts = $request->fileDescription;
            $media->Fails = $filePath; // Store the file path in the database
            $media->Autors = $request->author;
            $media->Autortiesibas = ($request->copyright == 'Yes') ? 1 : 0;
            $media->Status = 0; 
            $media->Lietotajs = Auth::id();
            $media->Multivides_tips = 'Music'; // Assuming this is always "Sound" for this controller
            $media->save();
        
            // Create a new Music instance and associate it with the Media instance
            $music = new Music();
            $music->Medija = $media->Me_ID; // Associate the Media ID with the Music instance
            if ($year !== null){ 
            $music->Izlaists = $year; // Save the extracted year
            }
            if ($bitrate !== null){ 
            $music->Bitrate = $bitrate;
            }
            $music->save();
        
            // Attach the selected category to the Music instance
            $categoryId = $request->category_id;
            $music->zanrs()->attach($categoryId);
        
            // Return a success message
            return back()->with('success', __('translation.fileUploaded'));
        }
    public function __construct()
        {
            $this->middleware('auth');
        }
}