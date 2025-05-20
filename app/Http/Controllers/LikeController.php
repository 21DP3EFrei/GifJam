<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media; 
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LikeController extends Controller
{

    // Function to display liked images
    public function images(Request $request)
    {    
        $user = Auth::user();

        // Initialize query for media
        $queryP = Media::where('Status', 1)->where('Multivides_tips', 'Image')->whereHas('favorites', function ($query) use ($user) {
            $query->where('Lietotajs', $user->id); // 'Lietotajs' should match the foreign key in your pivot table
            })->get();
        $picture = $queryP;        

        // Return the full view for non-AJAX requests
        return view('like.images', compact('picture'));
    }

     // Function to display liked sounds
    public function sounds(Request $request)
    {    
        $user = Auth::user();

        // Initialize query for media
        $queryS = Media::where('Status', 1)->where('Multivides_tips', 'Sound')->whereHas('favorites', function ($query) use ($user) {
            $query->where('Lietotajs', $user->id); // 'Lietotajs' should match the foreign key in your pivot table
            })->get();
        $sound = $queryS;

        // Return the full view for non-AJAX requests
        return view('like.sounds', compact('sound'));
    }

     // Function to display liked music
    public function music(Request $request)
    {    
        $user = Auth::user();
        $queryM = Media::where('Status', 1)->where('Multivides_tips', 'Music')->whereHas('favorites', function ($query) use ($user) {
            $query->where('Lietotajs', $user->id); // 'Lietotajs' should match the foreign key in your pivot table
            })->get();
        $music = $queryM;

        // Return the full view for non-AJAX requests
        return view('like.music', compact('music'));
    }

     // Function to add to like table
    public function like(Media $media)
    {
        
        $user = auth()->user(); // Fix: Use parentheses to call the method

        // Attach the media to the user's favorites
        $user->favoritedBy()->attach($media);

        return response()->json(['success' => true, 'message' => 'Media liked successfully.']);
    }

     // Function to remove liked content
    public function unlike(Media $media)
    {
        $user = auth()->user(); // Fix: Use parentheses to call the method

        // Detach the media from the user's favorites
        $user->favoritedBy()->detach($media);

        return response()->json(['success' => true, 'message' => 'Media unliked successfully.']);
    }
}