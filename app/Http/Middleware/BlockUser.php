<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Noblokets;

class BlockUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
            $userId = Auth::id();
            // Check if the user is in the Noblokets table and has Blokets set to true
            $isBlocked = Noblokets::where('L_ID', $userId)->where('Blokets', 1)->exists();

           
            // Redirect blocked users to the block page
            if ($isBlocked && !$request->routeIs('block')) {
                return redirect()->route('block')->with('error', 'You are blocked from accessing this site.');
            }
            // If the user ins't blocked redirect him back
            if (!$isBlocked && $request->routeIs('block')) {
                return back();
            }
        // Allow the request to proceed for non-blocked users or for the 'block' route
        return $next($request);
    }
}