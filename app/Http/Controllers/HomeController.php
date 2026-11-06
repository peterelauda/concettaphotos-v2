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
        // 1. Simpan Section statis ke Cache sebagai Array murni
        $sectionsData = Cache::remember('home_sections_data', 86400, function () {
            return Section::with([
                'media' => function ($q) {
                    $q->where('is_active', true)->orderBy('sort_order', 'asc');
                }
            ])
                ->where('is_active', true)
                ->get()
                ->toArray();
        });

        $sections = collect($sectionsData);

        $slides = $sections->firstWhere('key', 'home_hero_slideshow')['media'] ?? [];
        $heroSection = $sections->firstWhere('key', 'home_hero');
        $introSection = $sections->firstWhere('key', 'intro_about');
        $pricelistSection = $sections->firstWhere('key', 'home_pricelist');
        $concettalkSection = $sections->firstWhere('key', 'home_concettalk');
        $ctaSection = $sections->firstWhere('key', 'home_cta');

        $servicesSections = $sections->where('type', 'service_carousel')->values()->all();
        $menuItems = $sections->whereIn('type', ['about', 'services'])->values();

        // 2. AMBIL LANGSUNG TANPA CACHE
        // Agar likes_count dan komentar selalu tersinkronisasi secara real-time saat di-reload
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

        return Inertia::render('Welcome', [ // atau 'Welcome_2' sesuai nama file Anda
            'slides' => $slides,
            'heroSection' => $heroSection,
            'aboutItems' => $menuItems->where('type', 'about')->values()->all(),
            'servicesItems' => $menuItems->where('type', 'services')->values()->all(),
            'introSection' => $introSection,
            'servicesSections' => $servicesSections,
            'pricelistSection' => $pricelistSection,
            'concettalkSection' => $concettalkSection,
            'concettalkPosts' => $concettalkPosts,
            'ctaSection' => $ctaSection,
        ]);
    }
}
