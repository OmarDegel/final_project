<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }
    public function login(Request $request)
    {
        $data = $request->validate(
            [
                'email' => ['required', 'email', 'exists:users,email'],
                'password' => ['required']
            ]
        );
        $user = User::where('email', $data['email'])->first();
        if ($user && Hash::check($data['password'], $user->password)) {
            session()->put('user', $user);
            return redirect()->route("dashboard.index");
        }
        return redirect()->back()->with("error", __("site.invalid_email_or_password"));
    }
    public function logout()
    {
        if (session()->has('user')) {

            session()->forget('user');
            return redirect()->route('login.view');
        } else {
            return redirect()->route('login.view');
        }
    }
    public function registerPage()
    {
        return view('admin.auth.register');
    }
    public function register(Request $request)
    {
        $data = $request->validate(
            [
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'string', 'unique:users,phone','min:11','max:11'],
                'email' => ['required', 'email', 'unique:users,email'],
                'password' => ['required', 'confirmed', 'min:8', 'max:32'],
                "Lang" => "in:ar,en",
                "type" => "required"
            ]
        );
        $data['password'] = Hash::make($data['password']);
        $user=User::create($data);
        session()->put('user', $user);
        return redirect()->route('home')->with('success', __("site.added_successfully"));
    }
}
