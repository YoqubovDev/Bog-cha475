<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Departments;
use App\Models\TeacherStats;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $categories = \App\Models\Category::with(['teachers.category'])->get();
        $departments = Departments::all();
        $stats = TeacherStats::all() ?? (object) [
            'asosiy' => 0,
            'ilmiy' => 0,
            'kurator' => 0,
            'tashqi' => 0,
        ];

        return view('teachers', compact('categories', 'departments', 'stats'));
    }
}
