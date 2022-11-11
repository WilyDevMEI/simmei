@extends('layouts.dashboard')
@section('container')
    <div class="container-fluid px-4">
        <h4 class="mt-4 fw-bold">Data Jartest</h4>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Menu Jartest</li>
        </ol>

        @can('create jartest')
            <div class="card">
                <div class="card-header">
                    Tambah Data Jartest Konsumen
                </div>
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Selamat 👍</strong> {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form class="row g-3 needs-validation" method="POST" action="{{ route('jartest.store') }}" novalidate>
                        @csrf
                        <div class="col-md-3">
                            <label for="tanggal_jartest" class="form-label">Tanggal Jartest</label>
                            <input type="date" class="form-control" name="tanggal_jartest" id="tanggal_jartest" required>
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
                        <div class="col-md-4">
                            <label for="nama_produk" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" name="nama_produk" id="nama_produk" autocomplete="off"
                                spellcheck="false" required>
                        </div>
                        <div class="col-md-2">
                            <label for="cost" class="form-label">Cost / m3</label>
                            <input type="text" class="form-control" name="cost" id="cost" autocomplete="off"
                                spellcheck="false" required>
                        </div>
                        <div class="col-md-4">
                            <label for="jenis_air" class="form-label">Jenis Air Baku</label>
                            <input type="text" class="form-control" name="jenis_air" id="jenis_air" autocomplete="off"
                                spellcheck="false" required>
                        </div>
                        <div class="col-md-2">
                            <label for="dosis" class="form-label">Dosis</label>
                            <input type="text" class="form-control" name="dosis" id="dosis" autocomplete="off"
                                spellcheck="false" required>
                        </div>
                        <div class="col-12">
                            <label for="parameter_air" class="form-label">Parameter Air</label>
                            <input type="text" class="form-control" name="parameter_air" id="parameter_air"
                                autocomplete="off" spellcheck="false" required>
                        </div>
                        <div class="col-12">
                            <label for="data_teknik" class="form-label">Data Teknik</label>
                            <textarea name="data_teknik" id="data_teknik" rows="4" class="form-control" required></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary" id="save-data">Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        @endcan

        @can('read jartest')
            <div class="card mb-4 mt-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Jartest Konsumen
                </div>
                <div class="card-body">
                    <table id="datatables" class="table table-sm table-bordered" style="width: 100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="text-nowrap">Tanggal Jartest</th>
                                <th>Nama Konsumen</th>
                                <th>Wilayah</th>
                                <th>Nama Produk</th>
                                <th>Dosis</th>
                                <th>Cost / m3</th>
                                <th>Jenis Air Baku</th>
                                <th>Parameter Air</th>
                                <th>Data Teknik</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($jartests as $jartest)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $jartest->tanggal_jartest->format('d-m-Y') }}</td>
                                    <td>{{ $jartest->konsumen->nama_perusahaan }}</td>
                                    <td>{{ $jartest->wilayah }}</td>
                                    <td>{{ $jartest->nama_produk }}</td>
                                    <td>{{ $jartest->dosis }}</td>
                                    <td>{{ $jartest->cost }}</td>
                                    <td>{{ $jartest->jenis_air }}</td>
                                    <td>{{ $jartest->parameter_air }}</td>
                                    <td>{{ $jartest->data_teknik }}</td>
                                    <td>
                                        @can('edit jartest')
                                            <a href="{{ route('jartest.edit', $jartest->id) }}"
                                                class="btn btn-primary px-2 py-0">
                                                <box-icon type='solid' name='edit' size='xs' color='white'>
                                                </box-icon>
                                            </a>
                                        @endcan
                                        @can('delete jartest')
                                            <form action="{{ route('jartest.destroy', $jartest->id) }}" method="POST"
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
