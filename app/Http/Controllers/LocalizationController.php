<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
class LocalizationController extends Controller
{
    public function selected($lang)
    {
        if (in_array($lang,['en', 'lv', 'ru']))
        {
            App::setLocale($lang);
            Session::put('locale', $lang);
        }
        return back();
}
}