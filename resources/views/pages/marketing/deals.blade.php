@extends('layouts.dashboard')
@section('container')
    <div class="container-fluid px-4">
        <h4 class="mt-4 fw-bold">Data Deals</h4>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Menu Deals</li>
        </ol>

        @can('create deals')
            <div class="card">
                <div class="card-header">
                    Tambah Data Deals Konsumen
                </div>
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Selamat 👍</strong> {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form class="row g-3 needs-validation" method="POST" action="{{ route('deals.store') }}" novalidate>
                        @csrf
                        <div class="col-md-3">
                            <label for="tanggal_deals" class="form-label">Tanggal Deals</label>
                            <input type="date" class="form-control" name="tanggal_deals" id="tanggal_deals" required>
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
                            <label for="wilayah" class="form-label">Wilayah</label>
                            <select name="wilayah" id="wilayah" class="form-select" required>
                                <option value="" selected disabled>Pilih wilayah...</option>
                                <option value="Pekanbaru">Pekanbaru</option>
                                <option value="Medan">Medan</option>
                                <option value="Pontianak">Pontianak</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="nomor_po" class="form-label">Nomor PO</label>
                            <input type="text" class="form-control" name="nomor_po" id="nomor_po" autocomplete="off"
                                spellcheck="false" required>
                        </div>
                        <div class="col-md-6">
                            <label for="nama_produk" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" name="nama_produk" id="nama_produk" autocomplete="off"
                                spellcheck="false" required>
                        </div>
                        <div class="col-md-3">
                            <label for="kuantitas" class="form-label">Kuantitas</label>
                            <input type="text" class="form-control" name="kuantitas" id="kuantitas" autocomplete="off"
                                spellcheck="false" required>
                        </div>
                        <div class="col">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" rows="5" class="form-control" autocomplete="off" spellcheck="false"
                                required></textarea>
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
                    Data Konsumen
                </div>
                <div class="card-body">
                    <table id="datatables" class="table table-sm table-bordered" style="width: 100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="text-nowrap">Tanggal Deals</th>
                                <th>Nomor PO</th>
                                <th>Nama Perusahaan</th>
                                <th>Wilayah</th>
                                <th>Produk PO</th>
                                <th>QTY</th>
                                <th>Keterangan</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($deals as $deal)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $deal->tanggal_deals->format('d-m-Y') }}</td>
                                    <td>{{ $deal->nomor_po }}</td>
                                    <td>{{ $deal->konsumen->nama_perusahaan }}</td>
                                    <td>{{ $deal->wilayah }}</td>
                                    <td>{{ $deal->nama_produk }}</td>
                                    <td>{{ $deal->kuantitas }}</td>
                                    <td>{{ $deal->keterangan }}</td>
                                    <td class="text-nowrap">
                                        @can('edit deals')
                                            <a href="{{ route('deals.edit', $deal->id) }}" class="btn btn-primary px-2 py-0">
                                                <box-icon type='solid' name='edit' size='xs' color='white'></box-icon>
                                            </a>
                                        @endcan
                                        @can('delete deals')
                                            <form action="{{ route('deals.destroy', $deal->id) }}" method="POST"
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
                                    <td colspan="9">
                                        <div class="alert alert-info m-1 text-center">
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
