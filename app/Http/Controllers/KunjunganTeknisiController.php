<?php

namespace App\Http\Controllers;

use App\Models\Konsumen;
use App\Models\Teknisi\KunjunganTeknisi;
use Illuminate\Http\Request;

class KunjunganTeknisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $konsumens = Konsumen::all();
        $kunjungans = KunjunganTeknisi::with('konsumen')->get();
        return view('pages.teknisi.kunjungan', compact('konsumens', 'kunjungans'));
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
        KunjunganTeknisi::create($request->all());
        return redirect()->back()->with('success', 'Data Kunjungan Teknisi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teknisi\KunjunganTeknisi  $kunjunganTeknisi
     * @return \Illuminate\Http\Response
     */
    public function show(KunjunganTeknisi $kunjunganTeknisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teknisi\KunjunganTeknisi  $kunjunganTeknisi
     * @return \Illuminate\Http\Response
     */
    public function edit(KunjunganTeknisi $kunjunganteknisi)
    {
        $konsumens = Konsumen::all();
        return view('pages.teknisi.edit.kunjungan', compact('kunjunganteknisi', 'konsumens'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teknisi\KunjunganTeknisi  $kunjunganTeknisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KunjunganTeknisi $kunjunganteknisi)
    {
        $kunjunganteknisi->update($request->all());
        return redirect()->route('kunjunganteknisi.index')->with('success', 'Data Kunjungan Teknisi berhasil diperbaharui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teknisi\KunjunganTeknisi  $kunjunganTeknisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(KunjunganTeknisi $kunjunganTeknisi)
    {
        //
    }
}
