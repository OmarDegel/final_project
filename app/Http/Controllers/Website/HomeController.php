<?php

namespace App\Http\Controllers\Website;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $courses = Course::latest()->limit(3)->get();
        return view('website.index', compact('courses'));
    }
    public function courses(){
        $courses = Course::paginate(10);
        return view('website.courses', compact('courses'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function about(){
        return view('website.about');
    }
    public function show(string $id)
    {
        $course = Course::find($id);
        return view('website.coursesDetailes.course', compact('course'));
    }
}
