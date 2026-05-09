<?php

namespace App\Http\Controllers;

use App\Models\HomeSlider;
use App\Models\Reception;
use Illuminate\Http\Request;

class HomeSliderController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $categoryId = $request->input('category_id');

        $categories = \App\Models\Category::with(['teachers' => function($query) use ($search) {
            if ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            }
        }])
        ->when($categoryId, function($query) use ($categoryId) {
            $query->where('id', $categoryId);
        })
        ->get();

        // If searching, only show categories that have matching teachers
        if ($search || $categoryId) {
            $categories = $categories->filter(function($category) {
                return $category->teachers->count() > 0;
            });
        }

        $all_categories = \App\Models\Category::all();
        $qabulrasmis = Reception::latest()->get();
        return view('home', compact('qabulrasmis', 'categories', 'all_categories'));
    }
}
