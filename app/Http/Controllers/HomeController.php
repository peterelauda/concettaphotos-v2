<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\ConcettalkPost;
use Illuminate\Support\Facades\Cache;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function index(): Response
    {
        $sectionsData = Cache::remember('home_sections_data', 86400, function () {
            return Section::with([
                'media' => fn($q) => $q->where('is_active', true)->orderBy('sort_order', 'asc')
            ])
                ->where('is_active', true)
                ->get()
                ->toArray();
        });

        $sections = collect($sectionsData);

        $concettalkPosts = ConcettalkPost::where('is_active', true)
            ->withCount('likes')
            ->with([
                'comments' => fn($q) => $q->latest(),
                'comments.user',
                'comments.replies.user'
            ])
            ->latest()
            ->take(8)
            ->get()
            ->toArray();

        return Inertia::render('Welcome', [
            'slides' => $sections->firstWhere('key', 'home_hero_slideshow')['media'] ?? [],
            'heroSection' => $sections->firstWhere('key', 'home_hero'),
            'introSection' => $sections->firstWhere('key', 'about_us'),
            'servicesSections' => $sections->where('type', 'service_carousel')->values()->all(),
            'pricelistSection' => $sections->firstWhere('key', 'home_pricelist'),
            'concettalkSection' => $sections->firstWhere('key', 'home_concettalk'),
            'concettalkPosts' => $concettalkPosts,
            'ctaSection' => $sections->firstWhere('key', 'home_cta'),
        ]);
    }
}
