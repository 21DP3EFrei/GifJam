<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;
use App\Models\Kategorija;
use App\Models\Skana_kategorija;
use App\Models\Zanrs;

class UnverificationController extends Controller
{
    public function index(Request $request)
    {
        $query = Media::where('Status', 1);
    
        // Apply search filter if the 'search' parameter is present
        if ($request->filled('search')) {
            $query->where('Nosaukums', 'like', '%' . $request->input('search') . '%');
        }
    
        $approvedMedia = $query->get();
    
        // Check if the request is via AJAX
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'data' => view('unverification.media', compact('approvedMedia'))->render(),
            ]);
        }
    
        return view('unverification.index', compact('approvedMedia'));
    }
    
    public function mediaunverify(Request $request, Media $media)
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
        return redirect()->route('unverification.index')->with('success', __('translation.verifyStatus'));
    }

    public function editMedia(Request $request, Media $media)
    {
        $sound = $media->skana;  
        $music = $media->music;  

        $allMedia = Media::all(); 
        $categories = Kategorija::all();
        $soundCategories = Skana_kategorija::all();
        $zanrs = Zanrs::all();

        return view('unverification.edit', compact('media', 'allMedia', 'categories', 'soundCategories', 'zanrs', 'sound', 'music'));
    }
    public function update(Request $request, Media $media)
    {
        $sound = $media->skana;  
        $music = $media->music;  
    
        // Base validation rules
        $rules = [
            'Nosaukums' => 'required|string|max:100',
            'Apraksts' => 'nullable|string|max:200',
            'Autortiesibas' => 'integer',
            'Autortiesibas.*' => 'boolean',
        ];
    
        // Conditional validation based on media type
        if ($media->Multivides_tips == 'Sound') {
            $rules['Autors'] = 'nullable|string|max:100';
            $rules['Bitrate'] = 'required|integer';
            $rules['Izlaists'] = 'nullable|integer';
        } elseif ($media->Multivides_tips == 'Music') {
            $rules['Autors'] = 'required|string|max:100';
            $rules['Bitrate'] = 'required|integer';
            $rules['Izlaists'] = 'required|integer|min:1900|max:' . date('Y');
        } elseif ($media->Multivides_tips == 'Image') {
            $rules['Autors'] = 'required|string|max:100';
        }
    
        // Additional conditional rules based on media type
        if ($media->Multivides_tips == 'Image') {
            $rules['Kategorija_id'] = 'exists:kategorija,K_ID';
        } elseif ($media->Multivides_tips == 'Sound') {
            $rules['SoundKategorija_id'] = 'exists:skana_kategorija,SKat_ID';
        } elseif ($media->Multivides_tips == 'Music') {
            $rules['Zanrs_id'] = 'exists:zanrs,Z_ID';
        }
    
        // Validate the request with the fully defined rules
        $request->validate($rules);
    
        // Update the media record
        $media->update([
            'Nosaukums' => $request->Nosaukums,
            'Apraksts' => $request->Apraksts,
            'Autors' => $request->Autors,
            'Autortiesibas' => $request->Autortiesibas,
        ]);
    
        // Update related records based on media type
        if ($media->Multivides_tips === 'Sound') {
            $sound->update([
                'Bitrate' => $request->Bitrate,
            ]);
        } elseif ($media->Multivides_tips === 'Music') {
            $music->update([
                'Bitrate' => $request->Bitrate,
                'Izlaists' => $request->Izlaists,
            ]);
        }
    
        // Sync the selected categories with the media
        if ($media->Multivides_tips === 'Image') {
            $media->kategorijas()->sync($request->Kategorija_id);
        } elseif ($media->Multivides_tips === 'Sound' && $sound) {
            $sound->skanaKategorija()->sync($request->SoundKategorija_id);
        } elseif ($media->Multivides_tips === 'Music' && $music) {
            $music->zanrs()->sync($request->Zanrs_id);
        }
    
        return redirect()->route('unverification.index')->with('success', __('translation.verifyUpdate'));
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
