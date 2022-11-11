@extends('layouts.dashboard')
@section('container')
    <div class="container-fluid px-4">
        <h4 class="mt-4 fw-bold">Data Kunjungan Teknisi</h4>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('kunjunganteknisi.index') }}">Menu Kunjungan</a></li>
            <li class="breadcrumb-item active">Edit Data</li>
        </ol>

        <div class="card">
            <div class="card-header">
                Data Edit Kunjungan Teknisi
            </div>
            <div class="card-body">
                <form class="row g-3 needs-validation" method="POST" action="{{ route('kunjunganteknisi.update', $kunjunganteknisi->id) }}" novalidate>
                    @method('PUT')
                    @csrf
                    <div class="col-md-3">
                        <label for="tanggal_kunjungan" class="form-label">Tanggal Kunjungan Teknisi</label>
                        <input type="date" class="form-control" name="tanggal_kunjungan" id="tanggal_kunjungan" value="{{ $kunjunganteknisi->tanggal_kunjungan->format('Y-m-d') }}" required>
                    </div>

                    <div class="col-md-5">
                        <label for="konsumen_id" class="form-label">Nama Perusahaan Konsumen</label>
                        <select name="konsumen_id" id="konsumen_id" class="form-select" required>
                            <option value="" selected disabled>Pilih konsumen...</option>
                            @forelse ($konsumens as $konsumen)
                            <option value="{{ $konsumen->id }}" {{ $kunjunganteknisi->konsumen_id === $konsumen->id ? "selected" : "" }}>{{ $konsumen->nama_perusahaan }}</option>
                            @empty
                            <option disabled>Data masih kosong</option>
                            @endforelse
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="wilayah" class="form-label">Wilayah</label>
                        <select name="wilayah" id="wilayah" class="form-select" required>
                            <option value="" selected disabled>Pilih wilayah...</option>
                            <option value="Pekanbaru" {{ $kunjunganteknisi->wilayah === "Pekanbaru" ? "selected" : "" }}>Pekanbaru</option>
                            <option value="Medan" {{ $kunjunganteknisi->wilayah === "Medan" ? "selected" : "" }}>Medan</option>
                            <option value="Pontianak" {{ $kunjunganteknisi->wilayah === "Pontianak" ? "selected" : "" }}>Pontianak</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="pemakaian_air" class="form-label">Pemakaian Air</label>
                        <input type="text" class="form-control" name="pemakaian_air" id="pemakaian_air" value="{{ $kunjunganteknisi->pemakaian_air }}" autocomplete="off" spellcheck="false" required>
                    </div>

                    <div class="col-md-6">
                        <label for="tonase_produksi" class="form-label">Tonase Produksi</label>
                        <input type="text" class="form-control" name="tonase_produksi" id="tonase_produksi" value="{{ $kunjunganteknisi->tonase_produksi }}" autocomplete="off" spellcheck="false" required>
                    </div>

                    <div class="col-md-6">
                        <label for="proses_penjernihan" class="form-label">Proses Penjernihan</label>
                        <textarea name="proses_penjernihan" id="proses_penjernihan" class="form-control" rows="4" required>{{ $kunjunganteknisi->proses_penjernihan }}</textarea>
                    </div>

                    <div class="col-md-6">
                        <label for="pemakaian_bahan_kimia" class="form-label">Pemakaian Bahan Kimia</label>
                        <textarea name="pemakaian_bahan_kimia" id="pemakaian_bahan_kimia" class="form-control" rows="4" required>{{ $kunjunganteknisi->pemakaian_bahan_kimia }}</textarea>
                    </div>

                    <div class="col-md-4">
                        <label for="cost_penjernihan" class="form-label">Cost Penjernihan</label>
                        <input type="text" class="form-control" name="cost_penjernihan" id="cost_penjernihan" value="{{ $kunjunganteknisi->cost_penjernihan }}" autocomplete="off" spellcheck="false" required>
                    </div>

                    <div class="col-md-4">
                        <label for="cost_penjernihan_boiler" class="form-label">Cost Penjernihan Boiler</label>
                        <input type="text" class="form-control" name="cost_penjernihan_boiler" id="cost_penjernihan_boiler" value="{{ $kunjunganteknisi->cost_penjernihan_boiler }}" autocomplete="off" spellcheck="false" required>
                    </div>

                    <div class="col-md-4">
                        <label for="total_cost" class="form-label">Total Cost</label>
                        <input type="text" class="form-control" name="total_cost" id="total_cost" value="{{ $kunjunganteknisi->total_cost }}" autocomplete="off" spellcheck="false" required>
                    </div>

                    <div class="col-12">
                        <label for="hasil_presentasi" class="form-label">Hasil Presentasi</label>
                        <textarea name="hasil_presentasi" id="hasil_presentasi" rows="4" class="form-control" required>{{ $kunjunganteknisi->hasil_presentasi }}</textarea>
                    </div>

                    <div class="col-12">
                      <button type="submit" class="btn btn-primary" id="save-data">Simpan Data</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
