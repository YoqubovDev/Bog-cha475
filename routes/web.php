<?php

use App\Http\Controllers\AboutStaticController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\HomeSliderController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PhotocardController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\JobController;


use Illuminate\Support\Facades\Route;

Route::get('/about', [SliderController::class, 'index'])->name('about');
Route::get('/teachers', [TeacherController::class,'index'])->name('teachers');
Route::get('/', [HomeSliderController::class,'index'])->name('home');
Route::get('/dars', [GroupController::class, 'index'])->name('subject');
Route::get('/dars/{group}', [GroupController::class, 'show'])->name('groups.show');
Route::get('/photo', [VideoController::class, 'index'])->name('photo');
Route::get('/achievements', [PhotocardController::class,'index'])->name('achievements');
Route::get('/aloqa', [ContactController::class, 'index'])->name('contact');
Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/jobs', [JobController::class, 'index'])->name('jobs');
Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store');







