<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Media;

class MediaSearch
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Grab the already resolved Media model from the route
        $media = $request->route('media');
    
        // Make sure it's a single model, not a collection
        if (!$media || $media->Status !== 1) {
            return redirect()->route('welcome')->with('error', __('translation.errorMedia'));
        }
    
        return $next($request);
    }
    
}    
