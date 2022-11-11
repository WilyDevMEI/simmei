@extends('layouts.dashboard')
@section('container')
    <div class="container-fluid px-4">
        <h4 class="mt-4 fw-bold">Data Penetrasi</h4>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Menu Penetrasi</li>
        </ol>

        @can('create penetrasi')
            <div class="card">
                <div class="card-header">
                    Tambah Penetrasi Konsumen
                </div>
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Selamat 👍</strong> {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form class="row g-3 needs-validation" method="POST" action="{{ route('penetrasi.store') }}" novalidate>
                        @csrf
                        <div class="col-md-2">
                            <label for="tanggal_penetrasi" class="form-label">Tanggal Penetrasi</label>
                            <input type="date" class="form-control" name="tanggal_penetrasi" id="tanggal_penetrasi" required>
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
                            <label for="pic" class="form-label">P I C</label>
                            <input type="text" class="form-control" name="pic" id="pic" autocomplete="off"
                                spellcheck="false" required>
                        </div>
                        <div class="col-md-6">
                            <label for="hasil_penetrasi" class="form-label">Hasil Penetrasi</label>
                            <textarea name="hasil_penetrasi" id="hasil_penetrasi" rows="5" class="form-control" autocomplete="off"
                                spellcheck="false" required></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="kesimpulan" class="form-label">Kesimpulan</label>
                            <textarea name="kesimpulan" id="kesimpulan" rows="5" class="form-control" autocomplete="off" spellcheck="false"
                                required title="Kesimpulan"></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary" id="save-data">Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        @endcan

        @can('read penetrasi')
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
                                <th>P I C</th>
                                <th>Hasil Penetrasi</th>
                                <th>Kesimpulan</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($penetrasis as $penetrasi)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $penetrasi->tanggal_penetrasi->format('d-m-Y') }}</td>
                                    <td>{{ $penetrasi->konsumen->nama_perusahaan }}</td>
                                    <td>{{ $penetrasi->wilayah }}</td>
                                    <td>{{ $penetrasi->pic }}</td>
                                    <td>{{ $penetrasi->hasil_penetrasi }}</td>
                                    <td>{{ $penetrasi->kesimpulan }}</td>
                                    <td class="text-nowrap">
                                        @can('edit penetrasi')
                                            <a href="{{ route('penetrasi.edit', $penetrasi->id) }}"
                                                class="btn btn-primary px-2 py-0">
                                                <box-icon type='solid' name='edit' size='xs' color='white'></box-icon>
                                            </a>
                                        @endcan
                                        @can('delete penetrasi')
                                            <form action="{{ route('penetrasi.destroy', $penetrasi->id) }}" method="POST"
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
                                    <td colspan="8">
                                        <div class="alert alert-info m-2 text-center">
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
