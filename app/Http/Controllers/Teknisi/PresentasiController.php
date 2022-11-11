<?php

namespace App\Http\Controllers\Teknisi;

use App\Http\Controllers\Controller;
use App\Models\Konsumen;
use App\Models\Teknisi\Presentasi;
use Illuminate\Http\Request;

class PresentasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $presentasis = Presentasi::with('konsumen')->get();
        $konsumens = Konsumen::all();
        return view('pages.teknisi.presentasi', compact('presentasis', 'konsumens'));
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
        Presentasi::create($request->all());
        return redirect()->back()->with('success', 'Data berhasil Presentasi Teknisi ke konsumen berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teknisi\Presentasi  $presentasi
     * @return \Illuminate\Http\Response
     */
    public function show(Presentasi $presentasi)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teknisi\Presentasi  $presentasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Presentasi $presentasi)
    {
        $konsumens = Konsumen::all();
        return view('pages.teknisi.edit.presentasi', compact('presentasi', 'konsumens'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teknisi\Presentasi  $presentasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Presentasi $presentasi)
    {
        $presentasi->update($request->all());
        return redirect()->route('presentasi.index')->with('success', 'Data Presentasi berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teknisi\Presentasi  $presentasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Presentasi $presentasi)
    {
        $presentasi->delete();
        return redirect()->back()->with('success', 'Data Presentasi Teknisi berhasil dihapus.');
    }
}
