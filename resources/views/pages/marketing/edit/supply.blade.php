@extends('layouts.dashboard')
@section('container')
    <div class="container-fluid px-4">
        <h4 class="mt-4 fw-bold">Data Supply Konsumen</h4>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('supply.index') }}">Menu Supply</a></li>
            <li class="breadcrumb-item active">Edit data</li>
        </ol>

        <div class="card">
            <div class="card-header">
                Edit Data Supply Konsumen
            </div>
            <div class="card-body">
                <form class="row g-3 needs-validation" method="POST" action="{{ route('supply.update', $supply->id) }}" novalidate>
                    @method('PUT')
                    @csrf
                    <div class="col-md-3">
                        <label for="deal_id" class="form-label">Nomor PO</label>
                        <select name="deal_id" id="deal_id" class="form-select" required>
                            @forelse ($deals as $deal)
                            <option value="{{ $deal->id }}" {{ $deal->id === $supply->deal_id ? "selected" : "" }}>{{ $deal->nomor_po }}</option>
                            @empty
                            <option disabled>Data masih kosong</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="col-md-5">
                        <label for="konsumen_id" class="form-label">Nama Perusahaan Konsumen</label>
                        <select name="konsumen_id" id="konsumen_id" class="form-select" required>
                            @forelse ($konsumens as $konsumen)
                            <option value="{{ $konsumen->id }}" {{ $supply->konsumen_id === $konsumen->id ? "selected" : "" }}>{{ $konsumen->nama_perusahaan }}</option>
                            @empty
                            <option disabled>Data masih kosong</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="kategori" class="form-label">SPAM / PKS</label>
                        <input type="text" class="form-control" name="kategori" id="kategori" value="{{ $supply->kategori }}" autocomplete="off" spellcheck="false" required>
                    </div>
                    <div class="col-md-6">
                        <label for="nama_produk" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" name="nama_produk" id="nama_produk" value="{{ $supply->nama_produk }}" required>
                    </div>
                    <div class="col-md-2">
                        <label for="qty" class="form-label">QTY</label>
                        <input type="text" class="form-control" name="qty" id="qty" autocomplete="off" spellcheck="false" value="{{ $supply->qty }}" required>
                    </div>
                    <div class="col-md-2">
                        <label for="tanggal_surat_jalan" class="form-label">Tanggal Surat Jalan</label>
                        <input type="date" class="form-control" name="tanggal_surat_jalan" id="tanggal_surat_jalan" value="{{ $supply->tanggal_surat_jalan->format('Y-m-d') }}" required>
                    </div>
                    <div class="col-md-2">
                        <label for="no_surat_jalan" class="form-label">No. Surat Jalan</label>
                        <input type="text" class="form-control" name="no_surat_jalan" id="no_surat_jalan" autocomplete="off" spellcheck="false" value="{{ $supply->no_surat_jalan }}" required>
                    </div>
                    <div class="col-md-3">
                        <label for="ekspedisi" class="form-label">Ekspedisi</label>
                        <select name="ekspedisi" id="ekspedisi" class="form-select" required>
                            <option value="Eksternal" {{ $supply->ekspedisi === "Eksternal" ? "selected" : "" }}>Eksternal</option>
                            <option value="Internal" {{ $supply->ekspedisi === "Internal" ? "selected" : "" }}>Internal</option>
                        </select>
                    </div>
                    <div class="col-md-5">
                        <label for="pengirim_produk" class="form-label">Pengirim Produk</label>
                        <input type="text" name="pengirim_produk" id="pengirim_produk" class="form-control" autocomplete="off" spellcheck="false" value="{{ $supply->pengirim_produk }}" required>
                    </div>
                    <div class="col-md-4">
                        <label for="dikirim_dari" class="form-label">Dikirim dari</label>
                        <input type="text" name="dikirim_dari" id="dikirim_dari" class="form-control" autocomplete="off" spellcheck="false" value="{{ $supply->dikirim_dari }}" required>
                    </div>
                    <div class="col">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" class="form-control" rows="4" required>{{ $supply->keterangan }}</textarea>
                    </div>
                    <div class="col-12">
                      <button type="submit" class="btn btn-primary" id="save-data">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
