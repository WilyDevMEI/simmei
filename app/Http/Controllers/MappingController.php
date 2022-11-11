<?php

namespace App\Http\Controllers;

use App\Models\Mapping;
use App\Models\Konsumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MappingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mappings = Mapping::with('konsumen')->get();
        $konsumens = Konsumen::all();
        return view('pages.marketing.mapping', compact('konsumens', 'mappings'));
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
        if (!Auth::user()->hasPermissionTo('create relationship')) {
            abort(403, 'USER NOT ALLOWED TO DO THIS ACTION!');
        }
        Mapping::create($request->all());
        return redirect()->back()->with('success', 'Data mapping berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mapping  $mapping
     * @return \Illuminate\Http\Response
     */
    public function show(Mapping $mapping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mapping  $mapping
     * @return \Illuminate\Http\Response
     */
    public function edit(Mapping $mapping)
    {
        if (!Auth::user()->hasPermissionTo('edit mapping')) {
            abort(403, 'USER NOT ALLOWED TO DO THIS ACTION!');
        }
        $konsumens = Konsumen::all();
        return view('pages.marketing.edit.mapping', compact('mapping', 'konsumens'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mapping  $mapping
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mapping $mapping)
    {
        if (!Auth::user()->hasPermissionTo('edit mapping')) {
            abort(403, 'USER NOT ALLOWED TO DO THIS ACTION!');
        }
        $mapping->update($request->all());
        return redirect()->route('mapping.index')->with('success', 'Data mapping berhasil diperbaharui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mapping  $mapping
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mapping $mapping)
    {
        if (!Auth::user()->hasPermissionTo('delete mapping')) {
            abort(403, 'USER NOT ALLOWED TO DELETE ACTION!');
        }
        $mapping->delete();
        return redirect()->back()->with('success', 'Data Mapping konsumen berhasil dihapus.');
    }
}
