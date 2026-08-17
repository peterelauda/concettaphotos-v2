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
        $heroSection = Cache::remember('home_hero_slideshow', 60 * 24, function () {
            return Section::with(['media' => fn($q) => $q->where('is_active', true)->orderBy('sort_order', 'asc')])
                ->where('key', 'home_hero_slideshow')
                ->where('is_active', true)
                ->first();
        });

        $menuItems = Section::whereIn('type', ['about', 'services'])
            ->where('is_active', true)
            ->get(['id', 'title', 'link_url', 'type']);

        return Inertia::render('Welcome', [
            'slides' => $heroSection ? $heroSection->media : [],
            'aboutItems' => $menuItems->where('type', 'about')->values(),
            'servicesItems' => $menuItems->where('type', 'services')->values(),
        ]);
    }
}