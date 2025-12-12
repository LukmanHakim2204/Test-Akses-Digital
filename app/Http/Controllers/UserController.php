<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Spatie\Permission\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('roles')->get();
        return view('pages.users.index', compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('pages.users.create', compact('roles'));
    }
    /**
     * Store a newly created resource in storage.
     */


    public function store(UserRequest $request)
    {
        // Ambil data valid
        $data = $request->validated();

        // Hash password menggunakan Hash::make()
        $data['password'] = Hash::make($data['password']);

        // Simpan user
        $user = User::create($data);

        // Assign role Spatie
        $user->assignRole($request->role);

        Alert::toast('User created successfully', 'success');
        return redirect()->route('users.index');
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
        $user  = User::findOrFail($id);
        $roles = Role::all();

        return view('pages.users.update', compact('user', 'roles'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        $user = User::findOrFail($id);

        // Ambil data valid
        $data = $request->validated();


        if (empty($data['password'])) {
            unset($data['password']);
        } else {
            $data['password'] = Hash::make($data['password']);
        }

        // Update user
        $user->update($data);

        // Sync role Spatie
        $user->syncRoles($request->role);

        Alert::toast('User updated successfully', 'success');
        return redirect()->route('users.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        Alert::toast('User deleted successfully', 'success');
        return redirect()->route('users.index');
    }
}
