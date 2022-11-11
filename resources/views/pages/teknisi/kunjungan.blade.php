@extends('layouts.dashboard')
@section('container')
    <div class="container-fluid px-4">
        <h4 class="mt-4 fw-bold">Data Kunjungan Teknisi</h4>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Menu Kunjungan</li>
        </ol>

        @can('create kunjungan teknisi')
            <div class="card">
                <div class="card-header">
                    Tambah Data Kunjungan Teknisi
                </div>
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Selamat 👍</strong> {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form class="row g-3 needs-validation" method="POST" action="{{ route('kunjunganteknisi.store') }}"
                        novalidate>
                        @csrf
                        <div class="col-md-3">
                            <label for="tanggal_kunjungan" class="form-label">Tanggal Kunjungan Teknisi</label>
                            <input type="date" class="form-control" name="tanggal_kunjungan" id="tanggal_kunjungan" required>
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
                            <label for="pemakaian_air" class="form-label">Pemakaian Air</label>
                            <input type="text" class="form-control" name="pemakaian_air" id="pemakaian_air"
                                autocomplete="off" spellcheck="false" required>
                        </div>

                        <div class="col-md-6">
                            <label for="tonase_produksi" class="form-label">Tonase Produksi</label>
                            <input type="text" class="form-control" name="tonase_produksi" id="tonase_produksi"
                                autocomplete="off" spellcheck="false" required>
                        </div>

                        <div class="col-md-6">
                            <label for="proses_penjernihan" class="form-label">Proses Penjernihan</label>
                            <textarea name="proses_penjernihan" id="proses_penjernihan" class="form-control" rows="4" required></textarea>
                        </div>

                        <div class="col-md-6">
                            <label for="pemakaian_bahan_kimia" class="form-label">Pemakaian Bahan Kimia</label>
                            <textarea name="pemakaian_bahan_kimia" id="pemakaian_bahan_kimia" class="form-control" rows="4" required></textarea>
                        </div>

                        <div class="col-md-4">
                            <label for="cost_penjernihan" class="form-label">Cost Penjernihan</label>
                            <input type="text" class="form-control" name="cost_penjernihan" id="cost_penjernihan"
                                autocomplete="off" spellcheck="false" required>
                        </div>

                        <div class="col-md-4">
                            <label for="cost_penjernihan_boiler" class="form-label">Cost Penjernihan Boiler</label>
                            <input type="text" class="form-control" name="cost_penjernihan_boiler"
                                id="cost_penjernihan_boiler" autocomplete="off" spellcheck="false" required>
                        </div>

                        <div class="col-md-4">
                            <label for="total_cost" class="form-label">Total Cost</label>
                            <input type="text" class="form-control" name="total_cost" id="total_cost" autocomplete="off"
                                spellcheck="false" required>
                        </div>

                        <div class="col-12">
                            <label for="hasil_presentasi" class="form-label">Hasil Presentasi</label>
                            <textarea name="hasil_presentasi" id="hasil_presentasi" rows="4" class="form-control" required></textarea>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary" id="save-data">Simpan Data</button>
                        </div>

                    </form>
                </div>
            </div>
        @endcan

        @can('read kunjungan teknisi')
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
                                <th class="text-nowrap">Tanggal Kunjungan</th>
                                <th>Nama Konsumen</th>
                                <th>Wilayah</th>
                                <th>Pemakaian Air</th>
                                <th>Tonase Produksi</th>
                                <th>Proses Penjernihan</th>
                                <th>Pemakaian Bahan Kimia</th>
                                <th>Cost Penjernihan</th>
                                <th>Cost Penjernihan Boiler</th>
                                <th>Total Cost</th>
                                <th>Hasil Presentasi</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($kunjungans as $kunjungan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $kunjungan->tanggal_kunjungan->format('d-m-Y') }}</td>
                                    <td>{{ $kunjungan->konsumen->nama_perusahaan }}</td>
                                    <td>{{ $kunjungan->wilayah }}</td>
                                    <td>{{ $kunjungan->pemakaian_air }}</td>
                                    <td>{{ $kunjungan->tonase_produksi }}</td>
                                    <td>{{ $kunjungan->proses_penjernihan }}</td>
                                    <td>{{ $kunjungan->pemakaian_bahan_kimia }}</td>
                                    <td>{{ $kunjungan->cost_penjernihan }}</td>
                                    <td>{{ $kunjungan->cost_penjernihan_boiler }}</td>
                                    <td>{{ $kunjungan->total_cost }}</td>
                                    <td>{{ $kunjungan->hasil_presentasi }}</td>
                                    <td>
                                        @can('edit kunjungan teknisi')
                                            <a href="{{ route('kunjunganteknisi.edit', $kunjungan->id) }}"
                                                class="btn btn-primary px-2 py-0">
                                                <box-icon type='solid' name='edit' size='xs' color='white'>
                                                </box-icon>
                                            </a>
                                        @endcan
                                        @can('delete kunjungan teknisi')
                                            <form action="{{ route('kunjunganteknisi.destroy', $kunjungan->id) }}" method="POST"
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
