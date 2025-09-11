<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\RoleRequest;

class RoleController extends MainController
{
    public function __construct()
    {
        $this->middleware('permission:roles-index')->only('index');
        $this->middleware('permission:roles-store')->only('store', 'create');
        $this->middleware('permission:roles-update')->only('update', 'edit', 'show');
        $this->middleware('permission:roles-destroy')->only('destroy');
        $this->setClass('roles');
    }
    public function index()
    {
        $roles = Role::paginate(20);
        return view('admin.roles.index', compact('roles'));
    }


    public function create()
    {
        $permissions = Permission::get();
        $groupedPermissions = $permissions->groupBy(function ($perm) {
            $separator = str_contains($perm->name, '.') ? '.' : '-';
            $parts = explode($separator, $perm->name);
            return $parts[0];
        });
        return view('admin.roles.create', compact('groupedPermissions'));
    }


    public function store(RoleRequest $request)
    {
        $role = Role::create($request->only(['name', 'display_name']));
        if ($request->input('permissions')) {
            $role->syncPermissions($request->permissions);
        }
        return redirect()->route('roles.index')->with('success', __('site.added_successfully'));
    }


    public function show(string $id)
    {
        $role = Role::with('permissions')->findOrFail($id);
        $permissions = Permission::get();
        $groupedPermissions = $permissions->groupBy(function ($perm) {
            $separator = str_contains($perm->name, '.') ? '.' : '-';
            $parts = explode($separator, $perm->name);
            return $parts[0];
        });
        return view('admin.roles.show', compact('role', 'groupedPermissions'));
    }

    public function edit(string $id)
    {
        $role = Role::with('permissions')->findOrFail($id);
        $permissions = Permission::get();
        $groupedPermissions = $permissions->groupBy(function ($perm) {
            $separator = str_contains($perm->name, '.') ? '.' : '-';
            $parts = explode($separator, $perm->name);
            return $parts[0];
        });
        return view('admin.roles.edit', compact('role', 'groupedPermissions'));
    }


    public function update(RoleRequest $request, string $id)
    {
        $role = Role::findOrFail($id);
        $role->update($request->only(['name', 'display_name']));
        if ($request->input('permissions')) {
            $role->syncPermissions($request->permissions);
        } else {
            $role->syncPermissions([]);
        }
        return redirect()->route('roles.index')->with('success', __('site.updated_successfully'));
    }


    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);
        if ($role->users->count() > 0) {
            return redirect()->back()->with('error', __('site.cant_delete_role_with_users'));
        }
        $role->delete();
        return back()->with('success', __('site.deleted_successfully'));
    }
}
