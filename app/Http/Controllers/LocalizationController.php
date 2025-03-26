<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LocalizationController extends Controller
{
    public function change(Request $request)
    {
        $lang = $request->lang;

        // Validate the language
        if (!in_array($lang, ['en', 'lv', 'ru'])) {
            abort(400); // Bad request if the language is invalid
        }

        // Store the selected language in the session
        Session::put('locale', $lang);

        // Redirect back to the previous page
        return redirect()->back();
    }
}