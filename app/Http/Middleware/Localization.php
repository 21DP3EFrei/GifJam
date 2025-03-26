<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response; 
use Illuminate\Support\Facades\Log;

class Localization
{
    public function handle(Request $request, Closure $next): Response
    {    
        if ($request->session()->has('locale')) {
            $locale = $request->session()->get('locale');
            App::setLocale($locale);
        } else {
        }
    
        return $next($request);
    }
}