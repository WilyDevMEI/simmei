@extends('layouts.dashboard')
@section('container')
    <div class="container-fluid px-4">
        <h4 class="mt-4 fw-bold">Data Kondisi Lapangan</h4>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Menu Kondisi</li>
        </ol>

        @can('create kondisi')
            <div class="card">
                <div class="card-header">
                    Tambah Data Kondisi Lapangan
                </div>
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Selamat 👍</strong> {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form class="row g-3 needs-validation" method="POST" action="{{ route('kondisi.store') }}" novalidate>
                        @csrf
                        <div class="col-md-3">
                            <label for="tanggal_kondisi" class="form-label">Tanggal Komunikasi</label>
                            <input type="date" class="form-control" name="tanggal_kondisi" id="tanggal_kondisi" required>
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

                        <div class="col-12">
                            <label for="pic" class="form-label">P I C</label>
                            <input type="text" class="form-control" name="pic" id="pic" autocomplete="off"
                                spellcheck="false" required>
                        </div>

                        <div class="col-md-6">
                            <label for="kondisi_lapangan" class="form-label">Kondisi Lapangan</label>
                            <textarea name="kondisi_lapangan" id="kondisi_lapangan" rows="4" class="form-control" required></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="masalah" class="form-label">Masalah dilapangan</label>
                            <textarea name="masalah" id="masalah" rows="4" class="form-control" required></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="solusi" class="form-label">Solusi</label>
                            <textarea name="solusi" id="solusi" rows="4" class="form-control" required></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="kesimpulan" class="form-label">Kesimpulan</label>
                            <textarea name="kesimpulan" id="kesimpulan" rows="4" class="form-control" required></textarea>
                        </div>
                        <div class="col-12">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" rows="4" class="form-control" required></textarea>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary" id="save-data">Simpan Data</button>
                        </div>

                    </form>
                </div>
            </div>
        @endcan

        @can('read kondisi')
            <div class="card mb-4 mt-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Kunjungan Teknisi
                </div>
                <div class="card-body">
                    <table id="datatables" class="table table-sm table-bordered" style="width: 100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="text-nowrap">Tanggal Kondisi</th>
                                <th>Nama Konsumen</th>
                                <th>Wilayah</th>
                                <th>PIC</th>
                                <th>Kondisi Lapangan</th>
                                <th>Masalah</th>
                                <th>Solusi</th>
                                <th>Kesimpulan</th>
                                <th>Keterangan</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($kondisis as $kondisi)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $kondisi->tanggal_kondisi->format('d-m-Y') }}</td>
                                    <td>{{ $kondisi->konsumen->nama_perusahaan }}</td>
                                    <td>{{ $kondisi->wilayah }}</td>
                                    <td>{{ $kondisi->pic }}</td>
                                    <td>{{ $kondisi->kondisi_lapangan }}</td>
                                    <td>{{ $kondisi->masalah }}</td>
                                    <td>{{ $kondisi->solusi }}</td>
                                    <td>{{ $kondisi->kesimpulan }}</td>
                                    <td>{{ $kondisi->keterangan }}</td>
                                    <td>
                                        @can('edit kondisi')
                                            <a href="{{ route('kondisi.edit', $kondisi->id) }}" class="btn btn-primary px-2 py-0">
                                                <box-icon type='solid' name='edit' size='xs' color='white'>
                                                </box-icon>
                                            </a>
                                        @endcan
                                        @can('delete kondisi')
                                            <form action="{{ route('kondisi.destroy', $kondisi->id) }}" method="POST"
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
                                        <div class="alert alert-info m-1">
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
