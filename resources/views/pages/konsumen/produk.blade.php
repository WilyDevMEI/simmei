@extends('layouts.dashboard')
@section('container')
    <div class="container-fluid px-4">
        <h4 class="mt-4 fw-bold">Data Produk Konsumen</h4>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Produk</li>
        </ol>

        @can('create produk')
            <div class="card">
                <div class="card-header">
                    Tambah Produk Konsumen
                </div>
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Selamat 👍</strong> {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form class="row g-3 needs-validation" method="POST" action="{{ route('product.store') }}" novalidate>
                        @csrf
                        <div class="col-md-6">
                            <label for="konsumen_id" class="form-label">Nama Perusahaan</label>
                            <select name="konsumen_id" id="konsumen_id" class="form-select" required>
                                <option value="" selected disabled>Pilih konsumen...</option>
                                @forelse ($konsumen as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama_perusahaan }}</option>
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
                                    <option value="Produk">Produk</option>
                                    <option value="Jasa">Jasa</option>
                                </select>
                            </div>
                            <div class="col-md-7">
                                <label for="nama_produk" class="form-label">Nama Produk / Jasa</label>
                                <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                                    autocomplete="off" spellcheck="false" required>
                            </div>
                            <div class="col-md-3">
                                <label for="tonase_produksi" class="form-label">Tonase Produksi</label>
                                <input type="text" class="form-control" id="tonase_produksi" name="tonase_produksi"
                                    autocomplete="off" spellcheck="false" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="kegunaan" class="form-label">Kegunaan</label>
                            <textarea name="kegunaan" id="kegunaan" rows="5" class="form-control" required></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="spesifikasi" class="form-label">Spesifikasi</label>
                            <textarea name="spesifikasi" id="spesifikasi" rows="5" class="form-control" required></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary" id="save-data">Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        @endcan

        @can('read produk')
            <div class="card mb-4 mt-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Konsumen
                </div>
                <div class="card-body">
                    <table id="datatables" class="table table-sm table-bordered" style="width: 100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Perusahaan</th>
                                <th>Kategori</th>
                                <th>Nama Produk</th>
                                <th>Kegunaan</th>
                                <th>Spesifikasi</th>
                                <th>Tonase Produk</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <th class="align-middle">{{ $loop->iteration }}</th>
                                    <td class="align-middle">{{ $product->konsumen->nama_perusahaan }}</td>
                                    <td class="align-middle">{{ $product->kategori }}</td>
                                    <td class="align-middle">{{ $product->nama_produk }}</td>
                                    <td class="align-middle">{{ $product->kegunaan }}</td>
                                    <td class="align-middle">{{ $product->spesifikasi }}</td>
                                    <td class="align-middle">{{ $product->tonase_produksi }}</td>
                                    <td class="align-middle text-center">
                                        @can('edit produk')
                                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary px-2 py-0">
                                                <box-icon type='solid' name='edit' size='xs' color='white'></box-icon>
                                            </a>
                                        @endcan
                                        @can('delete produk')
                                            <form action="{{ route('product.destroy', $product->id) }}" method="POST"
                                                class="d-inline-block">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger px-2 py-0 btn-delete">
                                                    <box-icon name='trash-alt' size='xs' color='white'></box-icon>
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8">
                                        <div class="alert alert-info m-0 text-center">
                                            Data masih kosong
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @endcan
    </div>
@endsection
