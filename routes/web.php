<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('courses', CourseController::class);
Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');
Route::get('/api/courses', [CourseController::class, 'getCoursesBySectorAndDuration']);
