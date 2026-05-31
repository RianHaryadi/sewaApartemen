<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->query('category');
        
        $query = Gallery::where('is_active', true);
        
        if ($category && in_array($category, ['unit', 'facility', 'exterior'])) {
            $query->where('category', $category);
        }
        
        $galleries = $query->orderBy('order')->get();
        
        return view('gallery', compact('galleries', 'category'));
    }
}
