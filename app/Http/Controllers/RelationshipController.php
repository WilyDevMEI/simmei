<?php

namespace App\Http\Controllers;

use App\Models\Konsumen;
use App\Models\Relationship;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class RelationshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $konsumens = Konsumen::all();
        $relationships = Relationship::with('konsumen')->get();
        return view('pages.konsumen.relationship', compact('relationships', 'konsumens'));
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
        $validated = $request->validate([
            'nomor_po' => 'required',
            'konsumen_id' => 'required',
            'mulai_kontrak' => 'required',
            'selesai_kontrak' => 'required',
            'lama_kerjasama' => 'required',
            'sistem_pembayaran' => 'required',
            'keterangan' => 'required',
            'file_po' => 'required|max:2048|mimes:pdf',
        ]);

        if ($request->hasFile('file_po')) {
            $name = $request->file('file_po')->store('PO');
        }

        $validated['file_po'] = $name;

        Relationship::create($validated);
        return redirect()->back()->with('success', 'data relationship berhasil ditambah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Relationship  $relationship
     * @return \Illuminate\Http\Response
     */
    public function show(Relationship $relationship)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Relationship  $relationship
     * @return \Illuminate\Http\Response
     */
    public function edit(Relationship $relationship)
    {
        $konsumens = Konsumen::all();
        return view('pages.konsumen.edit-relationship', compact('relationship', 'konsumens'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Relationship  $relationship
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Relationship $relationship)
    {
        if (!auth()->user()->hasPermissionTo('edit relationship')) {
            abort(403, 'USER NOT ALLOWED TO THIS ACTION!');
        }

        if ($request->hasFile('file_po')) {

            if ($request->oldFile) {
                Storage::delete($request->oldFile);
            }
            $getNamePath = $request->file('file_po')->store('PO');
            $relationship->update([
                'nomor_po' => $request->nomor_po,
                'konsumen_id' => $request->konsumen_id,
                'mulai_kontrak' => $request->selesai_kontrak,
                'lama_kerjasama' => $request->lama_kerjasama,
                'sistem_pembayaran' => $request->sistem_pembayaran,
                'keterangan' => $request->keterangan,
                'file_po' => $getNamePath
            ]);
            return redirect()->route('relationship.index')->with('success', 'data relationship berhasil diperbaharui.');
        }

        $data = $request->except('oldFile');
        $data['file_po'] = $request->oldFile;

        $relationship->update($data);
        return redirect()->route('relationship.index')->with('success', 'data relationship berhasil diperbaharui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Relationship  $relationship
     * @return \Illuminate\Http\Response
     */
    public function destroy(Relationship $relationship)
    {
        if ($relationship->file_po) {
            Storage::delete($relationship->file_po);
        }
        $relationship->delete();
        return redirect()->back()->with('success', 'Data Relationship berhasil dihapus.');
    }

    public function open($id)
    {
        $data = Relationship::find($id);
        return response()->file('storage/' . $data->file_po);
    }
}
