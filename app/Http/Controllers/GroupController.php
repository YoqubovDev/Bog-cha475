<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Course;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        $groups = Group::with(['teacher', 'assistant', 'students'])->get();
        return view('dars', compact('groups','courses'));
    }

    public function show(Group $group)
    {
        $group->load(['teacher', 'assistant', 'students']);
        return view('group-show', compact('group'));
    }
}
