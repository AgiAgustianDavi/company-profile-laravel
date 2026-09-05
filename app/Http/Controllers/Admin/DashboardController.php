<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalServices = Service::count();
        $totalPortfolios = Portfolio::count();
        $totalMessages = ContactMessage::count();
        $unreadMessages = ContactMessage::where('is_read', false)->count();
        $totalUsers = User::count();
        $latestMessages = ContactMessage::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalServices',
            'totalPortfolios',
            'totalMessages',
            'unreadMessages',
            'totalUsers',
            'latestMessages'
        ));
    }
}
