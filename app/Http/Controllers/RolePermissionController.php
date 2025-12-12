<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\RolePermissionRequest;
use RealRashid\SweetAlert\Facades\Alert;

class RolePermissionController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions')->get();
        return view('pages.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('pages.roles.create', compact('permissions'));
    }

    public function store(RolePermissionRequest $request)
    {
        $role = Role::create(['name' => $request->name]);
        $role->syncPermissions($request->permissions ?? []);

        Alert::toast('Role created successfully.', 'success');
        return redirect()->route('roles.index');
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();

        return view('pages.roles.update', compact('role', 'permissions'));
    }

    public function update(RolePermissionRequest $request, $id)
    {
        $role = Role::findOrFail($id);

        $role->update(['name' => $request->name]);
        $role->syncPermissions($request->permissions ?? []);

        Alert::toast('Role updated successfully.', 'success');
        return redirect()->route('roles.index');
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);

        if ($role->users()->count() > 0) {
            Alert::error('Role sedang digunakan user, tidak dapat dihapus.');
            return back();
        }

        $role->delete();
        Alert::toast('Role deleted successfully.', 'success');

        return redirect()->route('roles.index');
    }
}
