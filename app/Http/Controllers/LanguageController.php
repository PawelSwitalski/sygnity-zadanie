<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    //
    public function languageSwitch(Request $request)
    {
        //Get the language from the form
        $language = $request->input('language');

        session(['language' => $language]);

        return redirect()->back()->withCookie(cookie('language', $language));
    }
}
