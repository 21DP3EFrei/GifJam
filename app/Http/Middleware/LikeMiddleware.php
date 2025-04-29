<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Media;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class LikeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
    if (!Auth::user()->favoritedBy()->exists()) {
        return redirect()->route('welcome')->with('error', __('translation.liek'));
    }    
    else{
        return $next($request);
    }
}
}
