<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Media;

class RandomMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

    // If no categories, always redirect to error page
    if (!Media::where('status', 1)->exists()) {
        return redirect()->route('welcome')->with('error', __('translation.errorRand'));
    }    
    else{
        return $next($request);
    }
    }
}
