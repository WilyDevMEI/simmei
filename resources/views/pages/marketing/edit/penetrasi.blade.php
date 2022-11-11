@extends('layouts.dashboard')
@section('container')
    <div class="container-fluid px-4">
        <h4 class="mt-4 fw-bold">Data Penetrasi</h4>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('penetrasi.index') }}">Penetrasi</a></li>
            <li class="breadcrumb-item active">Edit data</li>
        </ol>

        <div class="card">
            <div class="card-header">
                Data Penetrasi Konsumen
            </div>
            <div class="card-body">
                <form class="row g-3 needs-validation" method="POST" action="{{ route('penetrasi.update', $penetrasi->id) }}" novalidate>
                    @method('PUT')
                    @csrf
                    <div class="col-md-2">
                        <label for="tanggal_penetrasi" class="form-label">Tanggal Penetrasi</label>
                        <input type="date" class="form-control" name="tanggal_penetrasi" id="tanggal_penetrasi" value="{{ $penetrasi->tanggal_penetrasi->format('Y-m-d') }}" required>
                    </div>
                    <div class="col-md-4">
                        <label for="konsumen_id" class="form-label">Nama Perusahaan Konsumen</label>
                        <select name="konsumen_id" id="konsumen_id" class="form-select" required>
                            @forelse ($konsumens as $konsumen)
                            <option value="{{ $konsumen->id }}" {{ $penetrasi->konsumen_id === $konsumen->id ? "selected" : "" }}>{{ $konsumen->nama_perusahaan }}</option>
                            @empty
                            <option disabled>Data masih kosong</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="wilayah" class="form-label">Wilayah</label>
                        <select name="wilayah" id="wilayah" class="form-select" required>
                            <option value="" selected disabled>Pilih wilayah...</option>
                            <option value="Pekanbaru" {{ $penetrasi->wilayah === "Pekanbaru" ? "selected" : "" }}>Pekanbaru</option>
                            <option value="Medan" {{ $penetrasi->wilayah === "Medan" ? "selected" : "" }}>Medan</option>
                            <option value="Pontianak" {{ $penetrasi->wilayah === "Pontianak" ? "selected" : "" }}>Pontianak</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="pic" class="form-label">P I C</label>
                        <input type="text" class="form-control" name="pic" id="pic" autocomplete="off" spellcheck="false" value="{{ $penetrasi->pic }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="hasil_penetrasi" class="form-label">Hasil Penetrasi</label>
                        <textarea name="hasil_penetrasi" id="hasil_penetrasi" rows="5" class="form-control" autocomplete="off" spellcheck="false" required>{{ $penetrasi->hasil_penetrasi }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="kesimpulan" class="form-label">Kesimpulan</label>
                        <textarea name="kesimpulan" id="kesimpulan" rows="5" class="form-control" autocomplete="off" spellcheck="false" required title="Kesimpulan">{{ $penetrasi->kesimpulan }}</textarea>
                    </div>
                    <div class="col-12">
                      <button type="submit" class="btn btn-primary" id="save-data">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
