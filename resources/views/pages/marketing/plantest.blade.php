@extends('layouts.dashboard')
@section('container')
    <div class="container-fluid px-4">
        <h4 class="mt-4 fw-bold">Data Plantest Konsumen</h4>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Menu Plantest</li>
        </ol>

        @can('create plantest')
            <div class="card">
                <div class="card-header">
                    Tambah Data Plantest Konsumen
                </div>
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Selamat 👍</strong> {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form class="row g-3 needs-validation" method="POST" action="{{ route('plantest.store') }}" novalidate>
                        @csrf
                        <div class="col-md-3">
                            <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                            <input type="date" class="form-control" name="tanggal_mulai" id="tanggal_mulai" required>
                        </div>
                        <div class="col-md-3">
                            <label for="tanggal_berakhir" class="form-label">Tanggal Berakhir</label>
                            <input type="date" class="form-control" name="tanggal_berakhir" id="tanggal_berakhir" required>
                        </div>
                        <div class="col-md-6">
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
                            <label for="nama_produk" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" name="nama_produk" id="nama_produk" autocomplete="off"
                                spellcheck="false" required>
                        </div>
                        <div class="col-md-2">
                            <label for="qty" class="form-label">QTY</label>
                            <input type="text" class="form-control" name="qty" id="qty" autocomplete="off"
                                spellcheck="false" required>
                        </div>
                        <div class="col-md-3">
                            <label for="lama_plantest" class="form-label">Lama Plantest</label>
                            <input type="text" name="lama_plantest" id="lama_plantest" class="form-control"
                                autocomplete="off" spellcheck="false" required>
                        </div>
                        <div class="col-md-6">
                            <label for="penerima" class="form-label">Hasil Plantest</label>
                            <textarea name="hasil_plantest" id="hasil_plantest" rows="5" class="form-control" autocomplete="off"
                                spellcheck="false" required></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="kesimpulan" class="form-label">Kesimpulan</label>
                            <textarea name="kesimpulan" id="kesimpulan" rows="5" class="form-control" autocomplete="off" spellcheck="false"
                                required title="Kesimpulan Plantest"></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary" id="save-data">Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        @endcan

        @can('read plantest')
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
                                <th class="text-nowrap">Tanggal Mulai</th>
                                <th>Tanggal Berakhir</th>
                                <th>Nama Perusahaan</th>
                                <th>Wilayah</th>
                                <th>Nama Produk</th>
                                <th>QTY</th>
                                <th>Lama Plantest</th>
                                <th>Hasil Plantest</th>
                                <th>Kesimpulan</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($plantests as $plantest)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $plantest->tanggal_mulai->format('d-m-Y') }}</td>
                                    <td>{{ $plantest->tanggal_berakhir->format('d-m-Y') }}</td>
                                    <td>{{ $plantest->konsumen->nama_perusahaan }}</td>
                                    <td>{{ $plantest->wilayah }}</td>
                                    <td>{{ $plantest->nama_produk }}</td>
                                    <td>{{ $plantest->qty }}</td>
                                    <td>{{ $plantest->lama_plantest }}</td>
                                    <td>{{ $plantest->hasil_plantest }}</td>
                                    <td>{{ $plantest->kesimpulan }}</td>
                                    <td class="text-nowrap">
                                        @can('edit plantest')
                                            <a href="{{ route('plantest.edit', $plantest->id) }}"
                                                class="btn btn-primary px-2 py-0">
                                                <box-icon type='solid' name='edit' size='xs' color='white'>
                                                </box-icon>
                                            </a>
                                        @endcan
                                        @can('delete plantest')
                                            <form action="{{ route('plantest.destroy', $plantest->id) }}" method="POST"
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
                                    <td colspan="11">
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
