<?php

namespace App\Http\Controllers;

use App\Models\Konsumen;
use App\Models\Plantest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlantestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $konsumens = Konsumen::all();
        $plantests = Plantest::with('konsumen')->get();
        return view('pages.marketing.plantest', compact('konsumens', 'plantests'));
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
        if (!Auth::user()->hasPermissionTo('create plantest')) {
            abort(403, 'USER NOT ALLOWED TO THIS ACTION!');
        }
        Plantest::create($request->all());
        return redirect()->back()->with('success', 'Data Plantest berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plantest  $plantest
     * @return \Illuminate\Http\Response
     */
    public function show(Plantest $plantest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plantest  $plantest
     * @return \Illuminate\Http\Response
     */
    public function edit(Plantest $plantest)
    {
        if (!Auth::user()->hasPermissionTo('edit plantest')) {
            abort(403, 'USER NOT ALLOWED TO THIS ACTION!');
        }
        $konsumens = Konsumen::all();
        return view('pages.marketing.edit.plantest', compact('konsumens', 'plantest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plantest  $plantest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plantest $plantest)
    {
        if (!Auth::user()->hasPermissionTo('edit plantest')) {
            abort(403, 'USER NOT ALLOWED TO THIS ACTION!');
        }
        $plantest->update($request->all());
        return redirect()->route('plantest.index')->with('success', 'Data Plantest berhasil diperbaharui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plantest  $plantest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plantest $plantest)
    {
        if (!Auth::user()->hasPermissionTo('delete plantest')) {
            abort(403, 'USER UNAUTHORIZED FOR THIS ACTION!');
        }

        $plantest->delete();
        return redirect()->back()->with('success', 'Data Plantest berhasil dihapus');
    }
}
