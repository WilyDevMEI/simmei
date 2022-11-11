@extends('layouts.dashboard')
@section('container')
    <div class="container-fluid px-4">
        <h4 class="mt-4 fw-bold">Quatation</h4>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Menu Quatation</li>
        </ol>

        @can('create quatation')
            <div class="card">
                <div class="card-header">
                    Tambah Data Quatation Konsumen
                </div>
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Selamat 👍</strong> {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form class="row g-3 needs-validation" method="POST" action="{{ route('nego.store') }}" novalidate>
                        @csrf
                        <div class="col-md-2">
                            <label for="tanggal_nego" class="form-label">Tanggal Nego</label>
                            <input type="date" class="form-control" name="tanggal_nego" id="tanggal_nego" required>
                        </div>
                        <div class="col-md-4">
                            <label for="konsumen_id" class="form-label">Nama Perusahaan Konsumen</label>
                            <select name="konsumen_id" id="konsumen_id" class="form-select" required>
                                <option value="" selected disabled>Pilih konsumen...</option>
                                @forelse ($konsumens as $konsumen)
                                    <option value="{{ $konsumen->id }}">{{ $konsumen->nama_perusahaan }}</option>
                                @empty
                                    <option disabled>Data masih kosong</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="wilayah" class="form-label">Wilayah</label>
                            <select name="wilayah" id="wilayah" class="form-select" required>
                                <option value="" selected disabled>Pilih wilayah...</option>
                                <option value="Pekanbaru">Pekanbaru</option>
                                <option value="Medan">Medan</option>
                                <option value="Pontianak">Pontianak</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="nama_produk" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" name="nama_produk" id="nama_produk" autocomplete="off"
                                spellcheck="false" required>
                        </div>
                        <div class="col-md-4">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="text" name="harga" id="harga" class="form-control" autocomplete="off"
                                spellcheck="false" required>
                        </div>
                        <div class="col-md-4">
                            <label for="sistem_pembayaran" class="form-label">Sistem Pembayaran</label>
                            <input type="text" name="sistem_pembayaran" id="sistem_pembayaran" class="form-control"
                                autocomplete="off" spellcheck="false" required>
                        </div>
                        <div class="col-md-4">
                            <label for="penerima" class="form-label">Penerima</label>
                            <input type="text" name="penerima" id="penerima" class="form-control" autocomplete="off"
                                spellcheck="false" required>
                        </div>
                        <div class="col">
                            <label for="hasil" class="form-label">Hasil</label>
                            <textarea name="hasil" id="hasil" rows="5" class="form-control" autocomplete="off" spellcheck="false"
                                required title="Hasil Nego"></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary" id="save-data">Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        @endcan

        @can('read quatation')
            <div class="card mb-4 mt-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Penetrasi
                </div>
                <div class="card-body">
                    <table id="datatables" class="table table-sm table-bordered" style="width: 100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="text-nowrap">Tanggal Penetrasi</th>
                                <th>Nama Perusahaan</th>
                                <th>Wilayah</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Sistem Pembayaran</th>
                                <th>Penerima</th>
                                <th>Hasil Nego</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($negos as $nego)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $nego->tanggal_nego->format('d-m-Y') }}</td>
                                    <td>{{ $nego->konsumen->nama_perusahaan }}</td>
                                    <td>{{ $nego->wilayah }}</td>
                                    <td>{{ $nego->nama_produk }}</td>
                                    <td>{{ $nego->harga }}</td>
                                    <td>{{ $nego->sistem_pembayaran }}</td>
                                    <td>{{ $nego->penerima }}</td>
                                    <td>{{ $nego->hasil }}</td>
                                    <td class="text-nowrap">
                                        @can('edit quatation')
                                            <a href="{{ route('nego.edit', $nego->id) }}" class="btn btn-primary px-2 py-0">
                                                <box-icon type='solid' name='edit' size='xs' color='white'>
                                                </box-icon>
                                            </a>
                                        @endcan
                                        @can('delete quatation')
                                            <form action="{{ route('nego.destroy', $nego->id) }}" method="POST"
                                                class="d-inline-block">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger px-2 py-0 btn-delete">
                                                    <box-icon name='trash-alt' size='xs' color='white'></box-icon>
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10">
                                        <div class="alert alert-info m-1 text-center">
                                            Data masih kosong.
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
