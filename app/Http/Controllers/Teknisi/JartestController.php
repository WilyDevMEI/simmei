<?php

namespace App\Http\Controllers\Teknisi;

use App\Http\Controllers\Controller;
use App\Models\Jartest;
use App\Models\Konsumen;
use Illuminate\Http\Request;

class JartestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $konsumens = Konsumen::all();
        $jartests = Jartest::with('konsumen')->get();
        return view('pages.teknisi.jartest', compact('konsumens', 'jartests'));
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
        Jartest::create($request->all());
        return redirect()->back()->with('success', 'Data Jar Tes Konsumen berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jartest  $jartest
     * @return \Illuminate\Http\Response
     */
    public function show(Jartest $jartest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jartest  $jartest
     * @return \Illuminate\Http\Response
     */
    public function edit(Jartest $jartest)
    {
        $konsumens = Konsumen::all();
        return view('pages.teknisi.edit.edit-jartest', compact('jartest', 'konsumens'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jartest  $jartest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jartest $jartest)
    {
        $jartest->update($request->all());
        return redirect()->route('jartest.index')->with('success', 'Data edit jartest konsumen berhasil diperbaharui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jartest  $jartest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jartest $jartest)
    {
        $jartest->delete();
        return redirect()->back()->with('success', 'Data Jartest konsumen berhasil dihapus.');
    }
}
