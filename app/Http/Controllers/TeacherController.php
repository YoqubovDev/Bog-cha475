<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Departments; // <-- Qo'shish shart!
use App\Models\TeacherStats;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::with(['primaryGroups.assistant', 'primaryGroups.children', 'category'])->get();
        $departments = Departments::all();
        $stats = TeacherStats::first() ?? (object) [
            'asosiy' => 0,
            'ilmiy' => 0,
            'kurator' => 0,
            'tashqi' => 0,
        ];

        return view('teachers', compact('teachers', 'departments', 'stats'));
    }
}
