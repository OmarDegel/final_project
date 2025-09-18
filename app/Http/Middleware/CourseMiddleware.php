<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CourseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = User::find(session()->get('user')->id);
        $course = Course::find($request->route('course'));
        if (!$user || !$course) {
            return back()->with('error', __("site.not_found"));
        }

        if ($user->enrollments()->where('course_id', $course->id)->exists() ) {
            return $next($request);
        }

        return back()->with('error', __("site.not_enrolled"));
    }
}
