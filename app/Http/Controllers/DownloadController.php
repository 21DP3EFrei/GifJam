<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Saglabati;
use App\Models\User;
use App\Models\Mem;

class DownloadController extends Controller
{
    public function saveDownload(Request $request)
{
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
}