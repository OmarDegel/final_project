<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Enrollment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EnrollementController extends MainController
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->setClass('enrollements');
    }
    public function index()
    {
        $enrollements = Enrollment::where("user_id", session('user')->id)->with("course")->paginate(20);
        return view('admin.enrollements.index', compact('enrollements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userId = session('user')->id;
        $courseId = $request->course_id;

        $alreadyEnrolled = Enrollment::where('user_id', $userId)
            ->where('course_id', $courseId)
            ->exists();

        if (!$alreadyEnrolled) {
            Enrollment::create([
                'user_id' => $userId,
                'course_id' => $courseId
            ]);
        }

        return redirect()->back()->with('success', __('site.enrolled_successfully'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $enrollemnt = Enrollment::find($id);
        $enrollemnt->delete();
        return back()->with("success", __("site.deleted_successfully"));
    }
}
