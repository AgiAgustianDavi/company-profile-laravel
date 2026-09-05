<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index()
    {
        $settings = Setting::all_settings();
        $services = Service::where('is_active', true)->latest()->take(4)->get();
        $portfolios = Portfolio::where('is_active', true)->latest()->take(3)->get();

        return view('pages.home', compact('settings', 'services', 'portfolios'));
    }
}
