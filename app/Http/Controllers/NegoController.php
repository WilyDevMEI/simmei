<?php

namespace App\Http\Controllers;

use App\Models\Konsumen;
use App\Models\Nego;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NegoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $konsumens = Konsumen::all();
        $negos = Nego::with('konsumen')->get();
        return view('pages.marketing.nego', compact('konsumens', 'negos'));
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
        if (!Auth::user()->hasPermissionTo('create quatation')) {
            abort(403, "USER UNAUTHORIZED FOR THIS ACTION!");
        }
        Nego::create($request->all());
        return redirect()->back()->with('success', 'Data Nego Konsumen berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nego  $nego
     * @return \Illuminate\Http\Response
     */
    public function show(Nego $nego)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nego  $nego
     * @return \Illuminate\Http\Response
     */
    public function edit(Nego $nego)
    {
        if (!Auth::user()->hasPermissionTo('edit quatation')) {
            abort(403, "USER UNAUTHORIZED FOR THIS ACTION!");
        }
        $konsumens = Konsumen::all();
        return view('pages.marketing.edit.nego', compact('nego', 'konsumens'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nego  $nego
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nego $nego)
    {
        if (!Auth::user()->hasPermissionTo('edit quatation')) {
            abort(403, "USER UNAUTHORIZED FOR THIS ACTION!");
        }
        $nego->update($request->all());
        return redirect()->route('nego.index')->with('success', 'Data Nego Konsumen berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nego  $nego
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nego $nego)
    {
        if (!Auth::user()->hasPermissionTo('delete quatation')) {
            abort(403, "USER UNAUTHORIZED FOR THIS ACTION!");
        }
        $nego->delete();
        return redirect()->back()->with('success', 'Data Nego Konsumen berhasil dihapus.');
    }
}
