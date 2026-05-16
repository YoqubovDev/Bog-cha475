<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Departments;
use App\Models\TeacherStats;
use Illuminate\Http\Request;

class TeacherController extends Controller
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
            'teachers.category',
            'teachers.group',
            'teachers.group.assistant',
            'teachers.group.students',
            'home' => function($query) use ($search) {
                if ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                }
            },
            'home.category'
        ])
        ->where(function($query) {
            $query->where('category', 'like', 'Tarbiyalovchi%')
                  ->orWhere('category', 'like', 'Yordam%')
                  ->orWhere('category', 'like', '%tarbiyalovchi%');
        })
        ->when($categoryId, function($query) use ($categoryId) {
            $query->where('id', $categoryId);
        })
        ->get();

        // Merge teachers and home sliders (leadership) into the teachers relation and ensure uniqueness
        foreach ($categories as $category) {
            $combined = $category->teachers->concat($category->home)->unique('name');
            $category->setRelation('teachers', $combined);
        }

        // If searching, only show categories that have matching teachers (now including merged leadership)
        if ($search || $categoryId) {
            $categories = $categories->filter(function($category) {
                return $category->teachers->count() > 0;
            });
        }

        $all_categories = \App\Models\Category::where(function($query) {
            $query->where('category', 'like', 'Tarbiyalovchi%')
                  ->orWhere('category', 'like', 'Yordam%')
                  ->orWhere('category', 'like', '%tarbiyalovchi%');
        })->get();
        $departments = Departments::all();
        $stats = TeacherStats::all() ?? (object) [
            'asosiy' => 0,
            'ilmiy' => 0,
            'kurator' => 0,
            'tashqi' => 0,
        ];

        return view('teachers', compact('categories', 'all_categories', 'departments', 'stats'));
    }
}
