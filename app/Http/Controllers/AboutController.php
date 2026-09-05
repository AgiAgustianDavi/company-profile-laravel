<?php

namespace App\Http\Controllers;

use App\Models\Setting;

class AboutController extends Controller
{
    public function index()
    {
        $settings = Setting::all_settings();

        return view('pages.about', compact('settings'));
    }
}
