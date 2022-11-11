@extends('layouts.dashboard')
@section('container')
    <div class="container-fluid px-4">
        <h4 class="mt-4 fw-bold">Data Deals</h4>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('deals.index') }}">Menu Deals</a></li>
            <li class="breadcrumb-item active">Edit data</li>
        </ol>

        <div class="card">
            <div class="card-header">
                Edit Data Deals Konsumen
            </div>
            <div class="card-body">
                <form class="row g-3 needs-validation" method="POST" action="{{ route('deals.update', $deal->id) }}" novalidate>
                    @method('PUT')
                    @csrf
                    <div class="col-md-3">
                        <label for="tanggal_deals" class="form-label">Tanggal Deals</label>
                        <input type="date" class="form-control" name="tanggal_deals" id="tanggal_deals" value="{{ $deal->tanggal_deals->format('Y-m-d') }}" required>
                    </div>
                    <div class="col-md-5">
                        <label for="konsumen_id" class="form-label">Nama Perusahaan Konsumen</label>
                        <select name="konsumen_id" id="konsumen_id" class="form-select" required>
                            @forelse ($konsumens as $konsumen)
                            <option value="{{ $konsumen->id }}" {{ $deal->konsumen_id === $konsumen->id ? "selected" : "" }}>{{ $konsumen->nama_perusahaan }}</option>
                            @empty
                            <option disabled>Data masih kosong</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="wilayah" class="form-label">Wilayah</label>
                        <select name="wilayah" id="wilayah" class="form-select" required>
                            <option value="Pekanbaru" {{ $deal->wilayah === "Pekanbaru" ? "selected" : "" }}>Pekanbaru</option>
                            <option value="Medan" {{ $deal->wilayah === "Medan" ? "selected" : "" }}>Medan</option>
                            <option value="Pontianak" {{ $deal->wilayah === "Pontianak" ? "selected" : "" }}>Pontianak</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="nomor_po" class="form-label">Nomor PO</label>
                        <input type="text" class="form-control" name="nomor_po" id="nomor_po" autocomplete="off" spellcheck="false" value="{{ $deal->nomor_po }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="nama_produk" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" name="nama_produk" id="nama_produk" autocomplete="off" spellcheck="false" value="{{ $deal->nama_produk }}" required>
                    </div>
                    <div class="col-md-3">
                        <label for="kuantitas" class="form-label">Kuantitas</label>
                        <input type="text" class="form-control" name="kuantitas" id="kuantitas" autocomplete="off" spellcheck="false" value="{{ $deal->kuantitas }}" required>
                    </div>
                    <div class="col">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" rows="5" class="form-control" autocomplete="off" spellcheck="false" required>{{ $deal->keterangan }}</textarea>
                    </div>
                    <div class="col-12">
                      <button type="submit" class="btn btn-primary" id="save-data">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
