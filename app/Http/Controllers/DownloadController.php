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
            'meme_id' => 'required|exists:mem,id', // Ensure the meme ID exists in the database
        ]);

        // Get the meme ID from the request
        $memeId = $request->meme_id;

        // Create a new instance of Saglabati
        $download = new Saglabati();
        $download->Lietotaja_ID = auth()->id(); // Get the authenticated user's ID
        $download->Me_ID = $memeId;
        $download->save();

        // Return a success response
        return response()->json(['message' => 'Download instance saved successfully'], 200);
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
}