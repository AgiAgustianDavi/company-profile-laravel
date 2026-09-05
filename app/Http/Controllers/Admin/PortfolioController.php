<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PortfolioController extends Controller
{
    public function index(): View
    {
        $portfolios = Portfolio::latest()->paginate(10);

        return view('admin.portfolios.index', compact('portfolios'));
    }

    public function create(): View
    {
        return view('admin.portfolios.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateData($request);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('portfolios', 'public');
        }

        $validated['slug'] = Str::slug($validated['title']).'-'.Str::random(4);
        $validated['is_active'] = $request->boolean('is_active');

        Portfolio::create($validated);

        return redirect()->route('admin.portfolios.index')->with('success', 'Portofolio berhasil ditambahkan.');
    }

    public function edit(Portfolio $portfolio): View
    {
        return view('admin.portfolios.edit', compact('portfolio'));
    }

    public function update(Request $request, Portfolio $portfolio): RedirectResponse
    {
        $validated = $this->validateData($request, $portfolio->id);

        if ($request->hasFile('image')) {
            if ($portfolio->image) {
                Storage::disk('public')->delete($portfolio->image);
            }
            $validated['image'] = $request->file('image')->store('portfolios', 'public');
        }

        $validated['is_active'] = $request->boolean('is_active');

        $portfolio->update($validated);

        return redirect()->route('admin.portfolios.index')->with('success', 'Portofolio berhasil diperbarui.');
    }

    public function destroy(Portfolio $portfolio): RedirectResponse
    {
        if ($portfolio->image) {
            Storage::disk('public')->delete($portfolio->image);
        }

        $portfolio->delete();

        return redirect()->route('admin.portfolios.index')->with('success', 'Portofolio berhasil dihapus.');
    }

    private function validateData(Request $request, ?int $ignoreId = null): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'client' => ['nullable', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:100'],
            'image' => ['nullable', 'image', 'max:2048'],
            'description' => ['required', 'string'],
        ], [
            'title.required' => 'Judul portofolio wajib diisi.',
            'description.required' => 'Deskripsi wajib diisi.',
            'image.image' => 'File harus berupa gambar.',
            'image.max' => 'Ukuran gambar maksimal 2MB.',
        ]);
    }
}
