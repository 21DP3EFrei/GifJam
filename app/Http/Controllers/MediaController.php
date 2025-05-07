<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Media;
use App\Models\Skana;
use App\Models\Music;
use App\Models\Kategorija;
use App\Models\Zanrs;
use App\Models\Skana_kategorija;

class MediaController extends Controller
{
    // Image upload page
    public function ImageUpload()
    {
        $categories = Kategorija::all();
        return view('upload', compact('categories'));
    }
    public function uploadImage(Request $request)
    {
        $request->validate([
            'fileName' => 'required|string|max:100',
            'fileDescription' => 'nullable|string|max:200',
            'author' => 'required|string|max:100',
            'copyright' => 'integer',
            'copyright.*' => 'boolean',
            'category_id' => 'required|exists:kategorija,K_ID', // Ensure the selected category exists
            'uploadFile' => 'required|mimes:png,jpeg,webp,gif,jpg|max:20000',
        ], [
            'uploadFile.mimes' => __('translation.uploadImage'),
        ]);

        // Store the uploaded image file
        $image = $request->file('uploadFile');
        $fileName = uniqid() . '_' . $image->getClientOriginalName(); // Get the original filename
        $filePath = $request->file('uploadFile')->storeAs('uploads', $fileName, 'public');
    
        // Create a new media instance and save it to the database
        $media = new Media();
        $media->Nosaukums = $request->fileName;
        $media->Apraksts = $request->fileDescription;
        $media->Fails = $filePath; // Store the file path in the database instead of the actual file content
        $media->Autors = $request->author;
        $media->Autortiesibas = ($request->copyright == 1) ? 1 : 0;
        $media->Status = 0; // Set the default status to unpublished
        $media->Lietotajs = Auth::id();
        $media->Multivides_tips = 'Image';
        $media->save();

        $categories = $request->category_id;
        $media->kategorijas()->attach($categories);
    
        // Return a success message
        return back()->with('success', __('translation.fileUploaded'));
    }

    public function MusicUpload()
    {
        $genre = Zanrs::all();
        return view('uploadMusic', compact('genre'));
    }
    public function uploadMusic(Request $request)
    {
        // Validate the request
        $request->validate([
            'fileName' => 'required|string|max:100',
            'fileDescription' => 'nullable|string|max:200',
            'author' => 'required|string|max:100',
            'copyright' => 'integer',
            'copyright.*' => 'boolean',
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
        $fileName = uniqid() . '_' . $musicFile->getClientOriginalName(); // Get the original filename
        $filePath = $musicFile->storeAs('uploads', $fileName, 'public'); // Store the file in the public disk
    
        // Create a new Media instance and save it to the database
        $media = new Media();
        $media->Nosaukums = $request->fileName;
        $media->Apraksts = $request->fileDescription;
        $media->Fails = $filePath; // Store the file path in the database
        $media->Autors = $request->author;
        $media->Autortiesibas = ($request->copyright == 1) ? 1 : 0;
        $media->Status = 0; 
        $media->Lietotajs = Auth::id();
        $media->Multivides_tips = 'Music';
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
    public function SoundUpload()
    {
        $soundCategories = Skana_Kategorija::all();
        return view('uploadSound', compact('soundCategories'));
    }
    public function uploadSound(Request $request)
    {
        // Validate the request
        $request->validate([
            'fileName' => 'required|string|max:100',
            'fileDescription' => 'nullable|string|max:200',
            'category_id' => 'required|exists:skanas_kategorija,SKat_ID', // Ensure the selected category exists
            'uploadFile' => 'required|mimes:aac,aiff,alac,m4a,flac,mp3,wav,opus|max:20000',
            'author' => 'nullable|string|max:100',
        ], [
            'uploadFile.mimes' => __('translation.uploadSound'),
        ]);

        $sound = $request->file('uploadFile');
    
        // Analyze the file metadata using getID3
        $getID3 = new \getID3;
        $fileInfo = $getID3->analyze($sound->getPathname());
    
        // Extract the year from metadata
        $bitrate = $fileInfo['audio']['bitrate'] ?? null;

        // Store the uploaded sound file
        $fileName = uniqid() . '_' . $sound->getClientOriginalName(); // Get the original filename
        $filePath = $sound->storeAs('uploads', $fileName, 'public'); // Store the file in the public disk

        // Create a new Media instance and save it to the database
        $media = new Media();
        $media->Nosaukums = $request->fileName;
        $media->Apraksts = $request->fileDescription;
        $media->Fails = $filePath; // Store the file path in the database
        $media->Autors = $request->author;
        $media->Autortiesibas = 0; // Set to non copyrighthed by default
        $media->Status = 0; // Set the default status to unpublished
        $media->Lietotajs = Auth::id();
        $media->Multivides_tips = 'Sound'; // Assuming this is always "Sound" for this controller
        $media->save();

        // Create a new Skana instance and associate it with the Media instance
        $skana = new Skana();
        $skana->Medija = $media->Me_ID; // Associate the Media ID with the Skana instance
        $skana->Bitrate = $bitrate;
        $skana->save();

        // Attach the selected category to the Skana instance
        $categoryId = $request->category_id;
        $skana->skanaKategorija()->attach($categoryId);

        // Return a success message
        return back()->with('success', __('translation.fileUploaded'));
    }
    
    //Random media page
    public function random()
    {
        $media = Media::inRandomOrder()->where('Status', 1)->get()->first();
        return view('random', compact('media'));
    }

    //Function to download media
    public function download(Media $media)
    {

        $filePath = storage_path('app/public/' . $media->Fails);
        $newFileName = $media->Nosaukums . '.' . pathinfo($media->Fails, PATHINFO_EXTENSION);
    
        return response()->download($filePath, $newFileName);
    }

    //Function to show media info
    public function show(Media $media)
    {
        $sound = Skana::where('Medija', $media->Me_ID)->first();
        $music = Music::where('Medija', $media->Me_ID)->first();
        return view('show', compact('media', 'sound', 'music'));
    }
}