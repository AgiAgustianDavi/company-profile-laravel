<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::where('is_active', true)->latest()->paginate(9);

        return view('pages.portfolios.index', compact('portfolios'));
    }

    public function show(Portfolio $portfolio)
    {
        abort_unless($portfolio->is_active, 404);

        return view('pages.portfolios.show', compact('portfolio'));
    }
}
