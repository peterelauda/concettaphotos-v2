<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function index(): Response
    {
        $heroSection = Section::with([
            'media' => function ($query) {
                $query->where('is_active', true)
                    ->orderBy('sort_order', 'asc');
            }
        ])
            ->where('key', 'home_hero_slideshow')
            ->where('is_active', true)
            ->first();

        return Inertia::render('Welcome', [
            'slides' => $heroSection ? $heroSection->media : []
        ]);
    }
}