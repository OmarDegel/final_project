<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Traits\ImageTrait;
use App\Http\Controllers\Dashboard\MainController;
use App\Http\Requests\Dashboard\UserRequest;

class UserController extends MainController
{
    use ImageTrait;
    public function __construct()
    {

        $this->setClass('users');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.users.create', );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {

        $data = $request->except('image');
        $data['image'] = $this->uploadImage('users', $request);
        $user = User::create($data);
        return redirect()->route('users.index')->with('success', __('site.added_successfully'));
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
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user' ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        $user = User::findOrFail($id);
        $data = $request->except('image', 'password');

        // if ($request->hasFile('image')&& $request->image != $user->image) {
            $data['image'] = $this->editImage($request, $user, 'users');
        // }
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }
        $user->update($data);
        return redirect()->route('users.index')->with('success', __('site.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        if($user==auth()->user()){
            return redirect()->route('users.index')->with('error', __('site.cant_delete_yourself'));
        }
        if($user->image){
            $this->deleteImage($user->image);
        }
        $user->delete();
        return redirect()->route('users.index')->with('success', __('site.deleted_successfully'));
    }
    public function userActive(User $user)
    {
        $user->status = !$user->status;
        $user->save();
        return redirect()->back();
    }
}
