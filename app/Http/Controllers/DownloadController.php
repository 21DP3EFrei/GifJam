<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Saglabati;

class DownloadController extends Controller
{
    /**
     * Save a download record.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveDownload(Request $request)
    {
        // Validate the request data
        $request->validate([
            'media' => 'required|exists:Me_ID,id', 
        ]);

        // Get the meme ID from the request
        $mediaId = $request->media;

        // Create a new instance of Saglabati
        $download = new Saglabati();
        $download->Lietotaja_ID = auth()->id(); // Get the authenticated user's ID
        $download->Me_ID = $mediaId;
        $download->save();

        // Return a success response
        return response()->json(['message' => 'Download instance saved successfully'], 200);
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
}