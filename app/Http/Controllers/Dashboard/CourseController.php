<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Models\Course;
use App\Models\Category;
use App\Traits\MediaTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;

class CourseController extends MainController
{
    use MediaTrait;
    public function __construct()
    {
        $this->setClass('courses');
    }
    public function index()
    {
        $user=User::where('id',session('user')->id)->first();
        $courses =$user->instructorCourses()->paginate(10);
        if(session('user')->type == 'user'){
            return redirect()->route('home');
        }
        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all()->mapWithKeys(function ($category) {
            return [$category->id => $category->namelang()];
        });
        return view('admin.courses.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseRequest $request)
    {
        $data = $request->except('image', 'video');

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadFile('courses/images', $request, 'image');
        }

        if ($request->hasFile('video')) {
            $data['video'] = $this->uploadFile('courses/videos', $request, 'video');
        }

        $data['instructor_id'] = session('user')->id;

        Course::create($data);

        return redirect()->route('courses.index')
            ->with("success", __("site.added_successfully"));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $course = Course::find($id);
        $user=User::where('id',session('user')->id)->first();
        if($user->type == 'user' && $user->id != $course->instructor_id){
            return redirect()->route('home');
        }
        $categories = Category::all()->mapWithKeys(function ($category) {
            return [$category->id => $category->namelang()];
        });
        return view('admin.courses.edit', compact('course', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseRequest $request, string $id)
    {
        $course = Course::find($id);
        $user=User::where('id',session('user')->id)->first();
        if($user->type == 'user' && $user->id != $course->instructor_id){
            return redirect()->route('home');
        }
        $data = $request->except('image', 'video');
        if ($request->hasFile('image')) {
            $data['image'] = $this->editFile($request, $course, 'courses', 'image');
        }

        if ($request->hasFile('video')) {
            $data['video'] = $this->editFile($request, $course, 'courses', 'video');
        }

        $course->update($data);
        return redirect()->route('courses.index')->with("success", __("site.updated_successfully"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::find($id);
        if ($course->image) {
            $this->deleteFile($course->image);
        }
        if ($course->video) {
            $this->deleteFile($course->video);
        }
        $course->delete();
        return redirect()->route('courses.index')->with("success", __("site.deleted_successfully"));
    }

   
}
