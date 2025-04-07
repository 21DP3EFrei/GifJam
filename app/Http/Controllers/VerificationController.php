<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;
use App\Models\Kategorija;
use App\Models\Skana_kategorija;
use App\Models\Zanrs;

class VerificationController extends Controller
{
    public function index()
    {
        $unverifiedMems = Media::where('Status', 0)->get();

        $queryS = Media::where('Status', 1)->where('Multivides_tips', 'Sound');
        $queryM = Media::where('Status', 1)->where('Multivides_tips', 'Music');

        $sound = $queryS->get();
        $music = $queryM->get();
        return view('verification.index', compact('unverifiedMems',  'sound', 'music')); // Pass subcategories to the view
    }
    
    public function mediaverify(Request $request, Media $media)
    {
        // Validate the request
        $request->validate([
            'status' => 'required|boolean', // Status should be either true (approved) or false (rejected)
        ]);

        if ($request->status) {
            // Approve the media
            $media->update([
                'Status' => 1, // Set status to approved
            ]);
        } else {
            // Delete the meme if rejected
            $media->delete();
        }

        // Redirect back to the verification index page with a success message
        return redirect()->route('verification.index')->with('success', 'File verification status updated successfully.');
    }

    public function editMedia(Request $request, Media $media)
    {
        $allMedia = Media::all(); 
        $categories = Kategorija::all();
        $soundCategories = Skana_kategorija::all();
        $zanrs = Zanrs::all();

        return view('verification.edit', compact('media', 'allMedia', 'categories', 'soundCategories', 'zanrs'));
    }
    public function update(Request $request, Media $media)
    {
        $sound = $media->skana;  
        $music = $media->music;  

        // Validate the request data
        $request->validate([
            'Nosaukums' => 'required|string',
            'Apraksts' => 'nullable|string',
            'Autors' => 'required|string',
            'Autortiesibas' => 'required|in:0,1', // Ensure the value is either 0 or 1
        ]);

        if ($media->Multivides_tips === 'Image') {
            $rules['Kategorija_id'] = 'exists:kategorija,K_ID';
        } elseif ($media->Multivides_tips === 'Sound') {
            $rules['SoundKategorija_id'] = 'exists:skana_kategorija,SKat_ID';
        } elseif ($media->Multivides_tips === 'Music') {
            $rules['Zanrs_id'] = 'exists:zanrs,Z_ID';
        }

        // Update the media record
        $media->update([
            'Nosaukums' => $request->Nosaukums,
            'Apraksts' => $request->Apraksts,
            'Autors' => $request->Autors,
            'Autortiesibas' => $request->Autortiesibas, // Directly use the value (0 or 1)
        ]);
    
        // Sync the selected categories with the media
        if ($media->Multivides_tips === 'Image') {
            $media->kategorijas()->sync($request->Kategorija_id);
        } elseif ($media->Multivides_tips === 'Sound' && $sound) {
            $sound->skanaKategorija()->sync($request->SoundKategorija_id);
        } elseif ($media->Multivides_tips === 'Music' && $music) {
            $music->zanrs()->sync($request->Zanrs_id);
        }

        return redirect()->route('verification.index')->with('success', 'Media updated successfully.');
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
}
