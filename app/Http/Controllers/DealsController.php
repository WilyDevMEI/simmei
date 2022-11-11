<?php

namespace App\Http\Controllers;

use App\Models\Deals;
use App\Models\Konsumen;
use Illuminate\Http\Request;

class DealsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $konsumens = Konsumen::all();
        $deals = Deals::with('konsumen')->get();
        return view('pages.marketing.deals', compact('konsumens', 'deals'));
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
        Deals::create($request->all());
        return redirect()->back()->with('success', 'Data Deals berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Deals  $deals
     * @return \Illuminate\Http\Response
     */
    public function show(Deals $deals)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Deals  $deals
     * @return \Illuminate\Http\Response
     */
    public function edit(Deals $deal)
    {
        $konsumens = Konsumen::all();
        return view('pages.marketing.edit.deals', compact('deal', 'konsumens'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Deals  $deals
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deals $deals)
    {
        $deals->update($request->all());
        return redirect()->route('deals.index')->with('success', 'Data Deals konsumen berhasil diperbaharui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Deals  $deals
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deals $deal)
    {
        $deal->delete();
        return redirect()->back()->with('success', 'Data Deals Konsumen berhasil dihapus.');
    }
}
