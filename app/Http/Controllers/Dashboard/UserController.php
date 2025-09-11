<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Role;
use App\Models\User;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Dashboard\MainController;
use App\Http\Requests\Dashboard\UserRequest;

class UserController extends MainController
{
    use ImageTrait;
    public function __construct()
    {
        $this->middleware('permission:users-index')->only('index');
        $this->middleware('permission:users-store')->only('store', 'create');
        $this->middleware('permission:users-update')->only('update', 'edit', 'show');
        $this->middleware('permission:users-destroy')->only('destroy');
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
        $roles = Role::pluck('name', 'id')->toArray();

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {

        $data = $request->except('image');
        $data['image'] = $this->uploadImage('users', $request);
        $user = User::create($data);
        $user->addRoles([$request->role_id]);
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
        $user = User::with('roles')->findOrFail($id);
        $roles = Role::pluck('name', 'id')->toArray();
        $userRole = $user->roles->pluck('id')->first();
        return view('admin.users.edit', compact('user', 'roles', 'userRole'));
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
        $user->syncRoles([$request->role_id]);
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
