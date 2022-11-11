<?php

namespace App\Http\Controllers;

use App\Models\Introduction;
use App\Models\Konsumen;
use Illuminate\Http\Request;

class IntroductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $konsumens = Konsumen::all();
        $introductions = Introduction::with('konsumen')->get();
        return view('pages.introduction.introduction', compact('konsumens', 'introductions'));
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
        Introduction::create([
            'tanggal_input' => $request->tanggal_input,
            'konsumen_id' => $request->konsumen_id,
            'wilayah' => $request->wilayah,
            'mapping' => $request->mapping === null ? 0 : $request->mapping,
            'penetrasi' => $request->penetrasi === null ? 0 : $request->penetrasi,
            'plantest' => $request->plantest === null ? 0 : $request->plantest,
            'quatation' => $request->quatation === null ? 0 : $request->quatation,
            'deals' => $request->deals === null ? 0 : $request->deals,
            'supply' => $request->supply === null ? 0 : $request->supply,
            'kunjungan' => $request->kunjungan === null ? 0 : $request->kunjungan,
            'keterangan' => $request->keterangan === null ? 0 : $request->keterangan,
        ]);

        return redirect()->back()->with('success','Data Introduction konsumen berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Introduction  $introduction
     * @return \Illuminate\Http\Response
     */
    public function show(Introduction $introduction)
    {
        return view('pages.introduction.detail', compact('introduction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Introduction  $introduction
     * @return \Illuminate\Http\Response
     */
    public function edit(Introduction $introduction)
    {
        $konsumens = Konsumen::all();
        return view('pages.introduction.edit', compact('introduction', 'konsumens'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Introduction  $introduction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Introduction $introduction)
    {
        // dd($request->all());
        $introduction->update([
            'tanggal_input' => $request->tanggal_input,
            'konsumen_id' => $request->konsumen_id,
            'wilayah' => $request->wilayah,
            'mapping' => $request->mapping === null ? 0 : $request->mapping,
            'penetrasi' => $request->penetrasi === null ? 0 : $request->penetrasi,
            'plantest' => $request->plantest === null ? 0 : $request->plantest,
            'quatation' => $request->quatation === null ? 0 : $request->quatation,
            'deals' => $request->deals === null ? 0 : $request->deals,
            'supply' => $request->supply === null ? 0 : $request->supply,
            'kunjungan' => $request->kunjungan === null ? 0 : $request->kunjungan,
            'keterangan' => $request->keterangan === null ? 0 : $request->keterangan,
        ]);

        return redirect()->route('introduction.index')->with('success', 'Data Introduction konsumen berhasil diperbaharui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Introduction  $introduction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Introduction $introduction)
    {
        $introduction->delete();
        return redirect()->back()->with('success', 'Data Introduction berhasil dihapus.');
    }
}
