<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Setting;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        $query = Unit::with('images')->where('status', 'available');

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('tower', 'like', "%{$search}%")
                  ->orWhere('room_number', 'like', "%{$search}%");
            });
        }

        if ($request->has('type') && !empty($request->type)) {
            $query->where('type', $request->type);
        }

        if ($request->has('listing_type') && !empty($request->listing_type)) {
            $query->where('listing_type', $request->listing_type);
        }

        if ($request->has('price_min') && !empty($request->price_min)) {
            $query->where('price', '>=', $request->price_min);
        }

        if ($request->has('price_max') && !empty($request->price_max)) {
            $query->where('price', '<=', $request->price_max);
        }

        $units = $query->orderBy('created_at', 'desc')->paginate(9)->withQueryString();

        $settings = [
            'whatsapp_number' => Setting::get('whatsapp_number', '6281234567890'),
        ];

        return view('properti.index', compact('units', 'settings'));
    }

    public function show($id)
    {
        $unit = Unit::with('images')->findOrFail($id);
        

        $recommendations = Unit::with('images')
            ->where('id', '!=', $unit->id)
            ->where('status', 'available')
            ->where(function($q) use ($unit) {
                $q->where('type', $unit->type)
                  ->orWhere('listing_type', $unit->listing_type);
            })
            ->take(3)
            ->get();

        $settings = [
            'whatsapp_number' => Setting::get('whatsapp_number', '6281234567890'),
        ];

        return view('properti.show', compact('unit', 'recommendations', 'settings'));
    }
}
