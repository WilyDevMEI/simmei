@extends('layouts.dashboard')
@section('container')
    <div class="container-fluid px-4">
        <h4 class="mt-4 fw-bold">Data Kunjungan / Komunikasi</h4>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Menu Interaksi</li>
        </ol>

        @can('create kunjungan marketing')
            <div class="card">
                <div class="card-header">
                    Tambah Data
                </div>
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Selamat 👍</strong> {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form class="row g-3 needs-validation" method="POST" action="{{ route('kunjunganmarketing.store') }}"
                        novalidate>
                        @csrf
                        <div class="col-md-3">
                            <label for="tanggal_interaksi" class="form-label">Tanggal Kunjungan / Komunikasi </label>
                            <input type="date" class="form-control" name="tanggal_interaksi" id="tanggal_interaksi" required>
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
                            <label for="kategori" class="form-label">Kategori Interaksi</label>
                            <select name="kategori" id="kategori" class="form-select" required>
                                <option value="" selected disabled>Pilih Interaksi via..</option>
                                <option value="Kunjungan Ditempat">Kunjungan Ditempat</option>
                                <option value="Via Telepon">Via Telepon</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="lama_interaksi" class="form-label">Lama Interaksi</label>
                            <input type="text" class="form-control" name="lama_interaksi" id="lama_interaksi"
                                autocomplete="off" spellcheck="false" required>
                        </div>
                        <div class="col-md-5">
                            <label for="penerima_telepon" class="form-label">Penerima Telepon</label>
                            <input type="text" class="form-control" name="penerima_telepon" id="penerima_telepon"
                                autocomplete="off" spellcheck="false" placeholder="Nama Penerima | Nomor Telepon" required>
                            <div class="form-text">Beri tanda <strong>(-)</strong> jika kosong</div>
                        </div>
                        <div class="col-md-5">
                            <label for="pic" class="form-label">P I C</label>
                            <input type="text" class="form-control" name="pic" id="pic" autocomplete="off"
                                spellcheck="false" required>
                        </div>
                        <div class="col-md-6">
                            <label for="pembahasan" class="form-label">Pembahasan</label>
                            <textarea name="pembahasan" id="pembahasan" rows="5" class="form-control" autocomplete="off" spellcheck="false"
                                required></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="kesimpulan" class="form-label">Kesimpulan</label>
                            <textarea name="kesimpulan" id="kesimpulan" rows="5" class="form-control" autocomplete="off" spellcheck="false"
                                required></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary" id="save-data">Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        @endcan

        @can('read kunjungan marketing')
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
                                <th class="text-nowrap">Tanggal Interaksi</th>
                                <th>Nama Perusahaan</th>
                                <th>Interaksi Via</th>
                                <th>Lama Interaksi</th>
                                <th>Penerima Telepon</th>
                                <th class="text-nowrap">P I C</th>
                                <th>Pembahasan</th>
                                <th>Kesimpulan</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($kunjunganmarketings as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->tanggal_interaksi->format('d-m-Y') }}</td>
                                    <td>{{ $data->konsumen->nama_perusahaan }}</td>
                                    <td>{{ $data->kategori }}</td>
                                    <td>{{ $data->lama_interaksi }}</td>
                                    <td>{{ $data->penerima_telepon }}</td>
                                    <td class="text-nowrap">{{ $data->pic }}</td>
                                    <td>{{ $data->pembahasan }}</td>
                                    <td>{{ $data->kesimpulan }}</td>
                                    <td class="text-nowrap">
                                        @can('edit kunjungan marketing')
                                            <a href="{{ route('kunjunganmarketing.edit', $data->id) }}"
                                                class="btn btn-primary px-2 py-0">
                                                <box-icon type='solid' name='edit' size='xs' color='white'>
                                                </box-icon>
                                            </a>
                                        @endcan
                                        @can('delete kunjungan marketing')
                                            <form action="{{ route('kunjunganmarketing.destroy', $data->id) }}" method="POST"
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
