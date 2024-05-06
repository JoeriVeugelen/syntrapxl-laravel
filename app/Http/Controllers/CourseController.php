<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Sector;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        $sectors = Sector::all();
        return view('courses.index', ['courses' => $courses, 'sectors' => $sectors]);
    }

    public function getCoursesBySector(Request $request)
    {
        $sectorIds = $request->input('sector_ids');
        if ($sectorIds == null) {
            $courses = Course::all();
        } else {
            $courses = Course::whereIn('sector_id', $sectorIds)->get();
        }

        return view('courses.courses_partial', ['courses' => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return view('courses.show', ['course' => $course]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }
}
