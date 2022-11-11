<?php

namespace App\Http\Controllers;

use App\Models\Konsumen;
use App\Models\KunjunganMarketing;
use Illuminate\Http\Request;

class KunjunganMarketingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $konsumens = Konsumen::all();
        $kunjunganmarketings = KunjunganMarketing::with('konsumen')->get();
        return view('pages.marketing.kunjungan', compact('konsumens', 'kunjunganmarketings'));
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
        KunjunganMarketing::create($request->all());
        return redirect()->back()->with('success', 'Data Kunjungan Marketing berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KunjunganMarketing  $kunjunganMarketing
     * @return \Illuminate\Http\Response
     */
    public function show(KunjunganMarketing $kunjunganMarketing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KunjunganMarketing  $kunjunganMarketing
     * @return \Illuminate\Http\Response
     */
    public function edit(KunjunganMarketing $kunjunganMarketing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KunjunganMarketing  $kunjunganMarketing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KunjunganMarketing $kunjunganMarketing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KunjunganMarketing  $kunjunganMarketing
     * @return \Illuminate\Http\Response
     */
    public function destroy(KunjunganMarketing $kunjunganMarketing)
    {
        //
    }
}
