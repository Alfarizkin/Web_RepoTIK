<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class FileCourseController extends Controller
{
    public function index(Request $request)
    {
        $paginatedCourse = Course::paginate(10); 

        $paginatedCourse->onEachSide(2);

        return view('auth.course', compact('paginatedCourse'));
    }
}
