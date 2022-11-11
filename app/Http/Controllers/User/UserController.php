<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('pages.user.user', compact('users'));
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
        User::create([
            'name' => $request->name,
            'position' => $request->position,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'phone' => $request->phone
        ]);
        return redirect()->back()->with('success', 'Data user berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('pages.user.detail', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('pages.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = $request->except('password');
        if ($user->password !== $request->password) {
            $data['password'] = Hash::make($request->password);
            $user->update($data);
        } else {
            $data['password'] = $user->password;
            $user->update($data);
        }
        return redirect()->route('user.index')->with('success', 'Data pengguna berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (!Auth::user()->hasRole('super_admin')) {
            abort(403, "USER NOT ALLOWED TO DELETE THIS ACCOUNT!");
        }
        $user->delete();
        return redirect()->back()->with('succes', 'Data pengguna berhasil dihapus');
    }

    public function hasRole(User $user)
    {
        $roles = Role::all();
        return view('pages.user.has-role', compact('user', 'roles'));
    }


    public function assignRole(Request $request, User $user)
    {
        if ($user->hasRole($request->role)) {
            return back()->with('error', 'The user has role exists.');
        }
        $user->assignRole($request->role);
        return back()->with('success', 'Role pengguna berhasil ditambahkan');
    }
}
