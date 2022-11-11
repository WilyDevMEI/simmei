@extends('layouts.dashboard')
@section('container')
    <div class="container-fluid px-4">
        <h4 class="mt-4 fw-bold">Data Nego Konsumen</h4>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('nego.index') }}">Menu Nego</a></li>
            <li class="breadcrumb-item active">Nego</li>
        </ol>

        <div class="card">
            <div class="card-header">
                Edit Data Nego Konsumen
            </div>
            <div class="card-body">
                <form class="row g-3 needs-validation" method="POST" action="{{ route('nego.update', $nego->id) }}" novalidate>
                    @method('PUT')
                    @csrf
                    <div class="col-md-2">
                        <label for="tanggal_nego" class="form-label">Tanggal Nego</label>
                        <input type="date" class="form-control" name="tanggal_nego" id="tanggal_nego" value="{{ $nego->tanggal_nego->format('Y-m-d') }}" required>
                    </div>
                    <div class="col-md-4">
                        <label for="konsumen_id" class="form-label">Nama Perusahaan Konsumen</label>
                        <select name="konsumen_id" id="konsumen_id" class="form-select" required>
                            @forelse ($konsumens as $konsumen)
                            <option value="{{ $konsumen->id }}" {{ $nego->konsumen_id === $konsumen->id ? "selected" : "" }} >{{ $konsumen->nama_perusahaan }}</option>
                            @empty
                            <option disabled>Data masih kosong</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="wilayah" class="form-label">Wilayah</label>
                        <select name="wilayah" id="wilayah" class="form-select" required>
                            <option value="" selected disabled>Pilih wilayah...</option>
                            <option value="Pekanbaru" {{ $nego->wilayah === "Pekanbaru" ? "selected" : "" }}>Pekanbaru</option>
                            <option value="Medan" {{ $nego->wilayah === "Medan" ? "selected" : "" }}>Medan</option>
                            <option value="Pontianak" {{ $nego->wilayah === "Pontianak" ? "selected" : "" }}>Pontianak</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="nama_produk" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" name="nama_produk" id="nama_produk" autocomplete="off" spellcheck="false" value="{{ $nego->nama_produk }}" required>
                    </div>
                    <div class="col-md-4">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" name="harga" id="harga" class="form-control" autocomplete="off" spellcheck="false" value="{{ $nego->harga }}" required>
                    </div>
                    <div class="col-md-4">
                        <label for="sistem_pembayaran" class="form-label">Sistem Pembayaran</label>
                        <input type="text" name="sistem_pembayaran" id="sistem_pembayaran" class="form-control" autocomplete="off" spellcheck="false" value="{{ $nego->sistem_pembayaran }}" required>
                    </div>
                    <div class="col-md-4">
                        <label for="penerima" class="form-label">Penerima</label>
                        <input type="text" name="penerima" id="penerima" class="form-control" autocomplete="off" spellcheck="false" value="{{ $nego->penerima }}" required>
                    </div>
                    <div class="col">
                        <label for="hasil" class="form-label">Hasil</label>
                        <textarea name="hasil" id="hasil" rows="5" class="form-control" autocomplete="off" spellcheck="false" required title="Hasil Nego">{{ $nego->hasil }}</textarea>
                    </div>
                    <div class="col-12">
                      <button type="submit" class="btn btn-primary" id="save-data">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
