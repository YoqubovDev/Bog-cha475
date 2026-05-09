<?php

namespace App\Http\Controllers;

use App\Models\HomeSlider;
use App\Models\Reception;
use Illuminate\Http\Request;

class HomeSliderController extends Controller
{
    public function index()
    {
        $categories = \App\Models\Category::with(['teachers'])->get();
        $qabulrasmis = Reception::latest()->get();
        return view('home', compact('qabulrasmis', 'categories'));
    }
}
