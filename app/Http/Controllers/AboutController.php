<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Support\Facades\Cache;
use Inertia\Inertia;
use Inertia\Response;

class AboutController extends Controller
{
    public function index(): Response
    {
        // Gunakan sumber cache yang sama dengan HomeController agar 0 query tambahan
        $sectionsData = Cache::remember('home_sections_data', 86400, function () {
            return Section::with([
                'media' => fn($q) => $q->where('is_active', true)->orderBy('sort_order', 'asc')
            ])
                ->where('is_active', true)
                ->get()
                ->toArray();
        });

        $sections = collect($sectionsData);

        $aboutHeroBg = $sections->firstWhere('key', 'about_hero');
        $bgImage = $aboutHeroBg['media'][0]['file_path']
            ?? 'https://images.unsplash.com/photo-1516035069371-29a1b244cc32?q=80&w=2000&auto=format&fit=crop';

        $aboutSections = $sections->where('type', 'about')->sortBy('id')->values()->all();

        return Inertia::render('about/index', [
            'aboutSections' => $aboutSections,
            'bgImage' => $bgImage,
        ]);
    }
}