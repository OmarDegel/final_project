<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }
    public function login(Request $request)
    {
        $card = $request->only("email", "password");
        if (auth()->attempt($card, $request->filled("remember"))) {
            return redirect()->route('users.index');
        } else {
            return redirect()->back()->with("error", "Invalid email or password");
        }
    }
    public function logout()
    {
        auth()->guard('web')->logout();
        return redirect()->route("dashboard.login");
    }
}
