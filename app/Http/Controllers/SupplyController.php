<?php

namespace App\Http\Controllers;

use App\Models\Deals;
use App\Models\Konsumen;
use App\Models\Supply;
use Illuminate\Http\Request;

class SupplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $konsumens = Konsumen::all();
        $supplies = Supply::with('konsumen')->get();
        $deals = Deals::with('konsumen')->get();
        return view('pages.marketing.supply', compact('konsumens', 'supplies', 'deals'));
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
        Supply::create($request->all());
        return redirect()->back()->with('success', 'Data Supply Konsumen berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supply  $supply
     * @return \Illuminate\Http\Response
     */
    public function show(Supply $supply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supply  $supply
     * @return \Illuminate\Http\Response
     */
    public function edit(Supply $supply)
    {
        $konsumens = Konsumen::all();
        $deals = Deals::with('konsumen')->get();
        return view('pages.marketing.edit.supply', compact('konsumens', 'supply', 'deals'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supply  $supply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supply $supply)
    {
        $supply->update($request->all());
        return redirect()->route('supply.index')->with('success', 'Data Supply berhasil diperbaharui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supply  $supply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supply $supply)
    {
        $supply->delete();
        return redirect()->back()->with('success', 'Data Supply Konsumen berhasil dihapus.');
    }
}
