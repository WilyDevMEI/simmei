<?php

namespace App\Http\Controllers;

use App\Models\Konsumen;
use App\Models\Penetrasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenetrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $konsumens = Konsumen::all();
        $penetrasis = Penetrasi::with('konsumen')->get();
        return view('pages.marketing.penetrasi', compact('konsumens', 'penetrasis'));
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
        Penetrasi::create($request->all());
        return redirect()->back()->with('success', 'Data Penetrasi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penetrasi  $penetrasi
     * @return \Illuminate\Http\Response
     */
    public function show(Penetrasi $penetrasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penetrasi  $penetrasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Penetrasi $penetrasi)
    {
        if (!Auth::user()->hasPermissionTo('edit penetrasi')); {
            abort(403, 'USER NOT ALLOWED TO THIS ACTION!');
        }

        $konsumens = Konsumen::all();
        return view('pages.marketing.edit.penetrasi', compact('penetrasi', 'konsumens'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penetrasi  $penetrasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penetrasi $penetrasi)
    {
        if (!Auth::user()->hasPermissionTo('edit penetrasi')) {
            abort(403, 'USER NOT ALLOWED TO THIS ACTION!');
        }
        $penetrasi->update($request->all());
        return redirect()->route('penetrasi.index')->with('success', 'Data berhasil diperbaharui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penetrasi  $penetrasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penetrasi $penetrasi)
    {
        if (!Auth::user()->hasPermissionTo('delete penetrasi')) {
            abort(403, 'USER NOT ALLOWED TO THIS ACTION!');
        }

        $penetrasi->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
