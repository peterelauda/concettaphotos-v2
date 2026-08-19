<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Support\Facades\Cache;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function index(): Response
    {
        $slides = Cache::remember('home_hero_slideshow_media', 60 * 24, function () {
            $heroSection = Section::with(['media' => fn($q) => $q->where('is_active', true)->orderBy('sort_order', 'asc')])
                ->where('key', 'home_hero_slideshow')
                ->where('is_active', true)
                ->first();

            return $heroSection ? $heroSection->media->toArray() : [];
        });

        $menuItems = Section::whereIn('type', ['about', 'services'])
            ->where('is_active', true)
            ->get(['id', 'title', 'link_url', 'type']);

        return Inertia::render('Welcome', [
            'slides' => $slides,
            'aboutItems' => $menuItems->where('type', 'about')->values(),
            'servicesItems' => $menuItems->where('type', 'services')->values(),
        ]);
    }
}
