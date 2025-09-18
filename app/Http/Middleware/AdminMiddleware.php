<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!session()->has('user')) {
            return redirect()->route('login.view')->with('error', __("site.not_allowed"));
        }
        $user = User::find(session('user')->id);
        if ($user && ($user->type == 'user' || $user->type == 'instructor')) {
            app()->setLocale($user->lang);
            View::share('locale', $user->lang);
            return $next($request);
        }else{
            return redirect()->route('login.view')->with('error', __("site.not_allowed"));
        }
    }
}
