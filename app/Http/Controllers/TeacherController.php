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

        $categories = \App\Models\Category::with(['teachers' => function($query) use ($search) {
            if ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            }
        }, 'teachers.category'])
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
