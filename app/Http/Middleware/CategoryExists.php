<?php

namespace App\Http\Middleware;

use App\Models\Kategorija;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\RedirectResponse;
use function Laravel\Prompts\error;

class CategoryExists
{ 
    /* To not cause issues it is necessary to include a middleware to prevent accses to uploads if there are no categories */
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the authenticated user is an admin
        if (Kategorija::count() === 0) {
            return redirect()->route('error');
        }
        return $next($request);
    }
}
