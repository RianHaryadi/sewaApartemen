<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Gallery;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredUnits = Unit::with('images')
            ->where('is_featured', true)
            ->where('status', 'available')
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        $galleries = Gallery::where('is_active', true)
            ->orderBy('order')
            ->take(6)
            ->get();

        $settings = [
            'hero_title' => Setting::get('hero_title', 'Temukan Hunian Terbaik Anda Bersama Araia Property'),
            'hero_subtitle' => Setting::get('hero_subtitle', 'Experience the pinnacle of architectural masterpiece. Our curated portfolio offers residences that transcend ordinary living into a legacy of luxury.'),
            'company_name' => Setting::get('company_name', 'CV Pintu Langit Araia'),
            'whatsapp_number' => Setting::get('whatsapp_number', '6281234567890'),
        ];

        return view('home', compact('featuredUnits', 'galleries', 'settings'));
    }

    public function about()
    {
        $settings = [
            'company_name' => Setting::get('company_name', 'CV Pintu Langit Araia'),
            'company_address' => Setting::get('company_address', 'Mall Lagoon Avenue, Ground Floor unit G#59, Bekasi'),
            'company_nib' => Setting::get('company_nib', '3110220019938'),
            'whatsapp_number' => Setting::get('whatsapp_number', '6281234567890'),
        ];

        return view('about', compact('settings'));
    }

    public function legalitas()
    {
        $settings = [
            'company_name' => Setting::get('company_name', 'CV Pintu Langit Araia'),
            'company_address' => Setting::get('company_address', 'Mall Lagoon Avenue, Ground Floor unit G#59, Bekasi'),
            'company_nib' => Setting::get('company_nib', '3110220019938'),
        ];

        return view('legalitas', compact('settings'));
    }
}
