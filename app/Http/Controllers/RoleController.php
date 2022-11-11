<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('pages.role.role', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Role::create([
            'name' => $request->name,
            'guard_name' => 'web',
        ]);
        return redirect()->back()->with('success', 'Data role baru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $permissions = Permission::all();
        return view('pages.role.give_permission', compact('role', 'permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('pages.role.edit_role', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        if ($role->name === 'super_admin') {
            abort(403, 'NOT ALLOWED TO CHANGE NAME THIS ROLE!');
        }
        $role->update(['name' => $request->role]);
        return redirect()->route('role.index')->with('success', 'Data Role berhasil diperbaharui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $user = Auth::user();
        if (!$user->hasAllPermissions(['delete data', 'roles user', 'permission user'])) {

            abort(403, 'UNAUTHORIZED THIS ACTION!');
        }
        if ($role->name === 'super_admin') {
            abort(403, 'NOT ALLOWED TO DELETE THIS ROLE');
        }
        $role->delete();
        return back()->with('success', 'Data berhasi dihapus.');
    }

    public function givePermission(Request $request, Role $role)
    {
        for ($i = 0; $i < count($request->permission); $i++) {
            if ($role->hasPermissionTo($request->permission[$i])) {
                return back()->with('error', 'This role has permission exists.');
            }
            $role->givePermissionTo($request->permission[$i]);
        }
        return back()->with('success', 'Data Permission Role berhasil ditambahkan');
    }

    public function revokePermissionTo(Role $role, Permission $permission)
    {
        $role->revokePermissionTo($permission);
        return back()->with('success', 'Permission berhasil dihapus.');
    }
}
