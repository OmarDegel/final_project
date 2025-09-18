<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Traits\MediaTrait;
use App\Http\Requests\Dashboard\UserRequest;
use App\Http\Controllers\Dashboard\MainController;

class UserController extends MainController
{
    use MediaTrait;
    public function __construct()
    {

        $this->setClass('users');
    }
    /**
     * Display a listing of the resource.
     */


    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */


    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        if ($user->id != session('user')->id) {
            return redirect()->route('home');
        }
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        $user = User::findOrFail($id);
        $data = $request->except('image', 'password');

        if ($request->hasFile('image')) {
            $data['image'] = $this->editFile($request, $user, 'users', 'image');
        }
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }
        $user->update($data);
        session()->put('user', $user);
        return back()->with('success', __('site.updated_successfully'));
    }
}
