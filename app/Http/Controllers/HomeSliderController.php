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

        $categories = \App\Models\Category::with([
            'teachers' => function($query) use ($search) {
                if ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                }
            },
            'teachers.group',
            'teachers.group.assistant',
            'teachers.group.students',
            'home' => function($query) use ($search) {
                if ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                }
            }
        ])
        ->where(function($query) {
            $query->where('category', 'not like', 'Tarbiyalovchi%')
                  ->where('category', 'not like', 'Yordam%')
                  ->where('category', 'not like', '%tarbiyalovchi%');
        })
        ->when($categoryId, function($query) use ($categoryId) {
            $query->where('id', $categoryId);
        })
        ->get();

        foreach ($categories as $category) {
            $combined = $category->teachers->concat($category->home)->unique('name');
            $category->setRelation('teachers', $combined);
        }

        // If searching, only show categories that have matching teachers (including leadership)
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
