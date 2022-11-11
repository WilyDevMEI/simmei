<?php

namespace App\Http\Controllers\Teknisi;

use App\Http\Controllers\Controller;
use App\Models\Konsumen;
use App\Models\Teknisi\Kondisi;
use Illuminate\Http\Request;

class KondisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $konsumens = Konsumen::all();
        $kondisis = Kondisi::with('konsumen')->get();
        return view('pages.teknisi.kondisi', compact('konsumens', 'kondisis'));
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
        Kondisi::create($request->all());
        return redirect()->back()->with('success', 'Data Kunjungan Teknisi untuk kondisi lapangan berhasil didapatkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teknisi\Kondisi  $kondisi
     * @return \Illuminate\Http\Response
     */
    public function show(Kondisi $kondisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teknisi\Kondisi  $kondisi
     * @return \Illuminate\Http\Response
     */
    public function edit(Kondisi $kondisi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teknisi\Kondisi  $kondisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kondisi $kondisi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teknisi\Kondisi  $kondisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kondisi $kondisi)
    {
        $kondisi->delete();
        return redirect()->back()->with('success', 'Data Kunjungan Teknisi untuk kondisi lapangan berhasil dihapus.');
    }
}
