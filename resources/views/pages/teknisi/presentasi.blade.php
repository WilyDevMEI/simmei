@extends('layouts.dashboard')
@section('container')
    <div class="container-fluid px-4">
        <h4 class="mt-4 fw-bold">Data Presentasi Konsumen</h4>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Menu Presentasi</li>
        </ol>

        @can('create presentasi')
            <div class="card">
                <div class="card-header">
                    Tambah Data Presentasi Konsumen
                </div>
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Selamat 👍</strong> {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form class="row g-3 needs-validation" method="POST" action="{{ route('presentasi.store') }}" novalidate>
                        @csrf
                        <div class="col-md-3">
                            <label for="tanggal_presentasi" class="form-label">Tanggal Presentasi</label>
                            <input type="date" class="form-control" name="tanggal_presentasi" id="tanggal_presentasi"
                                required>
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
                        <div class="col-md-6">
                            <label for="pic" class="form-label">P I C</label>
                            <input type="text" class="form-control" name="pic" id="pic" autocomplete="off"
                                spellcheck="false" required>
                        </div>
                        <div class="col-md-6">
                            <label for="target_presentasi" class="form-label">Target Presentasi</label>
                            <input type="text" class="form-control" name="target_presentasi" id="target_presentasi"
                                autocomplete="off" spellcheck="false" required>
                        </div>
                        <div class="col-md-6">
                            <label for="peserta" class="form-label">Peserta</label>
                            <textarea name="peserta" id="peserta" class="form-control" rows="4" required></textarea>
                        </div>
                        <div class="col-md-6">
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

        @can('read presentasi')
            <div class="card mb-4 mt-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Presentasi Konsumen
                </div>
                <div class="card-body">
                    <table id="datatables" class="table table-sm table-bordered" style="width: 100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="text-nowrap">Tanggal Presentasi</th>
                                <th>Nama Konsumen</th>
                                <th>Wilayah</th>
                                <th>PIC</th>
                                <th>Target Presentasi</th>
                                <th>Peserta</th>
                                <th>Keterangan</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($presentasis as $presentasi)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $presentasi->tanggal_presentasi->format('d-m-Y') }}</td>
                                    <td>{{ $presentasi->konsumen->nama_perusahaan }}</td>
                                    <td>{{ $presentasi->wilayah }}</td>
                                    <td>{{ $presentasi->pic }}</td>
                                    <td>{{ $presentasi->target_presentasi }}</td>
                                    <td>{{ $presentasi->peserta }}</td>
                                    <td>{{ $presentasi->keterangan }}</td>
                                    <td>
                                        @can('edit presentasi')
                                            <a href="{{ route('presentasi.edit', $presentasi->id) }}"
                                                class="btn btn-primary px-2 py-0">
                                                <box-icon type='solid' name='edit' size='xs' color='white'></box-icon>
                                            </a>
                                        @endcan
                                        @can('delete presentasi')
                                            <form action="{{ route('presentasi.destroy', $presentasi->id) }}" method="POST"
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
