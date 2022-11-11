@extends('layouts.dashboard')
@section('container')
    <div class="container px-4">
        <h4 class="mt-4 fw-bold">Edit data produk</h4>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Produk</a></li>
            <li class="breadcrumb-item active">Edit data</li>
        </ol>

        <div class="card">
            <div class="card-header">
                Data Konsumen
            </div>
            <div class="card-body">
                <form class="row g-3 needs-validation" method="POST" action="{{ route('product.update', $product->id) }}" novalidate>
                    @method('PUT')
                    @csrf
                    <div class="col-md-6">
                        <label for="konsumen_id" class="form-label">Nama Perusahaan</label>
                        <select name="konsumen_id" id="konsumen_id" class="form-select" required>
                            @forelse ($konsumens as $konsumen)
                            <option value="{{ $konsumen->id }}" {{ $product->konsumen_id === $konsumen->id ? 'selected' : '' }}>{{ $konsumen->nama_perusahaan }}</option>
                            @empty
                            <option value="" selected disabled>Data masih kosong</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="row gx-3 my-2">
                        <div class="col-md-2">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select name="kategori" id="kategori" class="form-select" required>
                                <option value="" selected disabled>Pilih kategori...</option>
                                <option value="Produk" {{ $product->kategori === "Produk" ? 'selected' : '' }}>Produk</option>
                                <option value="Jasa" {{ $product->kategori === 'Jasa' ? 'selected' : '' }}>Jasa</option>
                            </select>
                        </div>
                        <div class="col-md-7">
                            <label for="nama_produk" class="form-label">Nama Produk / Jasa</label>
                            <input type="text" class="form-control" id="nama_produk" name="nama_produk" autocomplete="off" spellcheck="false" value="{{ $product->nama_produk }}" required>
                        </div>
                        <div class="col-md-3">
                            <label for="tonase_produksi" class="form-label">Tonase Produksi</label>
                            <input type="text" class="form-control" id="tonase_produksi" name="tonase_produksi" autocomplete="off" value="{{ $product->tonase_produksi }}" spellcheck="false" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="kegunaan" class="form-label">Kegunaan</label>
                        <textarea name="kegunaan" id="kegunaan" rows="5" class="form-control" required>{{ $product->kegunaan }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="spesifikasi" class="form-label">Spesifikasi</label>
                        <textarea name="spesifikasi" id="spesifikasi" rows="5" class="form-control" required>{{ $product->spesifikasi }}</textarea>
                    </div>
                    <div class="col-12">
                      <button type="submit" class="btn btn-primary">Perbaharui Data</button>
                    </div>
                  </form>
            </div>
        </div>
    </div>
@endsection
