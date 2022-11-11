@extends('layouts.dashboard')
@section('container')
    <div class="container-fluid px-4">
        <h4 class="mt-4 fw-bold">Data Supply Konsumen</h4>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Menu Supply</li>
        </ol>

        @can('create supply')
            <div class="card">
                <div class="card-header">
                    Tambah Data Supply Konsumen
                </div>
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Selamat 👍</strong> {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form class="row g-3 needs-validation" method="POST" action="{{ route('supply.store') }}" novalidate>
                        @csrf
                        <div class="col-md-3">
                            <label for="deal_id" class="form-label">Nomor PO</label>
                            <select name="deal_id" id="deal_id" class="form-select" required>
                                <option value="" selected disabled>Pilih Nomor PO...</option>
                                @forelse ($deals as $deal)
                                    <option value="{{ $deal->id }}">{{ $deal->nomor_po }}</option>
                                @empty
                                    <option disabled>Data masih kosong</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="col-md-5">
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
                        <div class="col-md-4">
                            <label for="kategori" class="form-label">SPAM / PKS</label>
                            <input type="text" class="form-control" name="kategori" id="kategori" autocomplete="off"
                                spellcheck="false" required>
                        </div>
                        <div class="col-md-6">
                            <label for="nama_produk" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" name="nama_produk" id="nama_produk" required>
                        </div>
                        <div class="col-md-2">
                            <label for="qty" class="form-label">QTY</label>
                            <input type="text" class="form-control" name="qty" id="qty" autocomplete="off"
                                spellcheck="false" required>
                        </div>
                        <div class="col-md-2">
                            <label for="tanggal_surat_jalan" class="form-label">Tanggal Surat Jalan</label>
                            <input type="date" class="form-control" name="tanggal_surat_jalan" id="tanggal_surat_jalan"
                                required>
                        </div>
                        <div class="col-md-2">
                            <label for="no_surat_jalan" class="form-label">No. Surat Jalan</label>
                            <input type="text" class="form-control" name="no_surat_jalan" id="no_surat_jalan"
                                autocomplete="off" spellcheck="false" required>
                        </div>
                        <div class="col-md-3">
                            <label for="ekspedisi" class="form-label">Ekspedisi</label>
                            <select name="ekspedisi" id="ekspedisi" class="form-select" required>
                                <option value=""selected disabled>Pilih Ekspedisi...</option>
                                <option value="Eksternal">Eksternal</option>
                                <option value="Internal">Internal</option>
                            </select>
                        </div>
                        <div class="col-md-5">
                            <label for="pengirim_produk" class="form-label">Pengirim Produk</label>
                            <input type="text" name="pengirim_produk" id="pengirim_produk" class="form-control"
                                autocomplete="off" spellcheck="false" required>
                        </div>
                        <div class="col-md-4">
                            <label for="dikirim_dari" class="form-label">Dikirim dari</label>
                            <input type="text" name="dikirim_dari" id="dikirim_dari" class="form-control" autocomplete="off"
                                spellcheck="false" required>
                        </div>
                        <div class="col">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" class="form-control" rows="4" required></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary" id="save-data">Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        @endcan

        @can('read deals')
            <div class="card mb-4 mt-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Plantest
                </div>
                <div class="card-body">
                    <table id="datatables" class="table table-sm table-bordered" style="width: 100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="text-nowrap">Nomor PO</th>
                                <th>Nama Perusahaan</th>
                                <th>SPAM/PKS</th>
                                <th>Nama Produk</th>
                                <th>QTY</th>
                                <th class="text-nowrap">Tanggal SJ</th>
                                <th class="text-nowrap">No. SJ</th>
                                <th>Ekspedisi</th>
                                <th>Pengirim</th>
                                <th>Dikirim dari</th>
                                <th>Keterangan</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($supplies as $supply)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $supply->deal->nomor_po }}</td>
                                    <td>{{ $supply->konsumen->nama_perusahaan }}</td>
                                    <td>{{ $supply->kategori }}</td>
                                    <td>{{ $supply->nama_produk }}</td>
                                    <td>{{ $supply->qty }}</td>
                                    <td>{{ $supply->tanggal_surat_jalan->format('d-m-Y') }}</td>
                                    <td>{{ $supply->no_surat_jalan }}</td>
                                    <td>{{ $supply->ekspedisi }}</td>
                                    <td>{{ $supply->pengirim_produk }}</td>
                                    <td>{{ $supply->dikirim_dari }}</td>
                                    <td>{{ $supply->keterangan }}</td>
                                    <td class="text-nowrap">
                                        @can('edit supply')
                                            <a href="{{ route('supply.edit', $supply->id) }}" class="btn btn-primary px-2 py-0">
                                                <box-icon type='solid' name='edit' size='xs' color='white'>
                                                </box-icon>
                                            </a>
                                        @endcan
                                        @can('delete supply')
                                            <form action="{{ route('supply.destroy', $supply->id) }}" method="POST"
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
                                    <td colspan="13">
                                        <div class="alert alert-info m-1 text-center">
                                            Data Masih Kosong
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
