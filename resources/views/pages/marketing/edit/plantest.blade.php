@extends('layouts.dashboard')
@section('container')
    <div class="container-fluid px-4">
        <h4 class="mt-4 fw-bold">Data Plantest Konsumen</h4>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('plantest.index') }}">Menu Plantest</a></li>
            <li class="breadcrumb-item active">Edit Data</li>
        </ol>

        <div class="card">
            <div class="card-header">
                Edit Data Plantest Konsumen
            </div>
            <div class="card-body">
                <form class="row g-3 needs-validation" method="POST" action="{{ route('plantest.update', $plantest->id) }}" novalidate>
                    @method('PUT')
                    @csrf
                    <div class="col-md-3">
                        <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control" name="tanggal_mulai" id="tanggal_mulai" value="{{ $plantest->tanggal_mulai->format('Y-m-d') }}" required>
                    </div>
                    <div class="col-md-3">
                        <label for="tanggal_berakhir" class="form-label">Tanggal Berakhir</label>
                        <input type="date" class="form-control" name="tanggal_berakhir" id="tanggal_berakhir" value="{{ $plantest->tanggal_mulai->format('Y-m-d') }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="konsumen_id" class="form-label">Nama Perusahaan Konsumen</label>
                        <select name="konsumen_id" id="konsumen_id" class="form-select" required>
                            @forelse ($konsumens as $konsumen)
                            <option value="{{ $konsumen->id }}" {{ $plantest->konsumen_id === $konsumen->id ? "selected" : "" }}>{{ $konsumen->nama_perusahaan }}</option>
                            @empty
                            <option disabled>Data masih kosong</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="wilayah" class="form-label">Wilayah</label>
                        <select name="wilayah" id="wilayah" class="form-select" required>
                            <option value="Pekanbaru" {{ $plantest->wilayah === "Pekanbaru" ? "selected" : "" }}>Pekanbaru</option>
                            <option value="Medan" {{ $plantest->wilayah === "Medan" ? "selected" : "" }}>Medan</option>
                            <option value="Pontianak" {{ $plantest->wilayah === "Pontianak" ? "selected" : "" }}>Pontianak</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="nama_produk" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" name="nama_produk" id="nama_produk" value="{{ $plantest->nama_produk }}" autocomplete="off" spellcheck="false" required>
                    </div>
                    <div class="col-md-2">
                        <label for="qty" class="form-label">QTY</label>
                        <input type="text" class="form-control" name="qty" id="qty" value="{{ $plantest->qty }}" autocomplete="off" spellcheck="false" required>
                    </div>
                    <div class="col-md-3">
                        <label for="lama_plantest" class="form-label">Lama Plantest</label>
                        <input type="text" name="lama_plantest" id="lama_plantest" class="form-control" value="{{ $plantest->lama_plantest }}" autocomplete="off" spellcheck="false" required>
                    </div>
                    <div class="col-md-6">
                        <label for="penerima" class="form-label">Hasil Plantest</label>
                        <textarea name="hasil_plantest" id="hasil_plantest" rows="5" class="form-control" autocomplete="off" spellcheck="false" required>{{ $plantest->hasil_plantest }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="kesimpulan" class="form-label">Kesimpulan</label>
                        <textarea name="kesimpulan" id="kesimpulan" rows="5" class="form-control" autocomplete="off" spellcheck="false" required title="Kesimpulan Plantest">{{ $plantest->kesimpulan }}</textarea>
                    </div>
                    <div class="col-12">
                      <button type="submit" class="btn btn-primary" id="save-data">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
