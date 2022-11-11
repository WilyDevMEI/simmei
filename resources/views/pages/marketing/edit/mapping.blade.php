@extends('layouts.dashboard')
@section('container')
    <div class="container-fluid px-4">
        <h4 class="mt-4 fw-bold">Edit data mapping</h4>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('mapping.index') }}">Mapping</a></li>
            <li class="breadcrumb-item active">Edit data</li>
        </ol>

        <div class="card">
            <div class="card-header">
                Data Mapping Konsumen
            </div>
            <div class="card-body">
                <form class="row g-3 needs-validation" method="POST" action="{{ route('mapping.update', $mapping->id) }}" novalidate>
                    @method('PUT')
                    @csrf
                    <div class="col-md-3">
                        <label for="tanggal_mapping" class="form-label">Tanggal Mapping</label>
                        <input type="date" class="form-control" name="tanggal_mapping" id="tanggal_mapping" value="{{ $mapping->tanggal_mapping->format('Y-m-d') }}" required>
                    </div>
                    <div class="col-md-5">
                        <label for="konsumen_id" class="form-label">Nama Perusahaan Konsumen</label>
                        <select name="konsumen_id" id="konsumen_id" class="form-select" required>
                            <option value="" selected disabled>Pilih konsumen...</option>
                            @forelse ($konsumens as $konsumen)
                            <option value="{{ $konsumen->id }}" {{ $mapping->konsumen_id == $konsumen->id ? 'selected' : '' }}>{{ $konsumen->nama_perusahaan }}</option>
                            @empty
                            <option disabled>Data masih kosong</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="wilayah" class="form-label">Wilayah</label>
                        <select name="wilayah" id="wilayah" class="form-select" required>
                            <option value="" selected disabled>Pilih wilayah...</option>
                            <option value="Pekanbaru" {{ $mapping->wilayah === "Pekanbaru" ? "selected" : "" }}>Pekanbaru</option>
                            <option value="Medan" {{ $mapping->wilayah === "Medan" ? "selected" : "" }}>Medan</option>
                            <option value="Pontianak" {{ $mapping->wilayah === "Pontianak" ? "selected" : "" }}>Pontianak</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="jarak_tempuh" class="form-label">Jarak Tempuh</label>
                        <input type="text" class="form-control" name="jarak_tempuh" id="jarak_tempuh" value="{{ $mapping->jarak_tempuh }}" autocomplete="off" spellcheck="false" required>
                    </div>
                    <div class="col-md-5">
                        <label for="jumlah_peserta" class="form-label">Jumlah Peserta</label>
                        <input type="text" class="form-control" name="jumlah_peserta" id="jumlah_peserta" value="{{ $mapping->jumlah_peserta }}" autocomplete="off" spellcheck="false" required>
                    </div>
                    <div class="col-md-5">
                        <label for="lama_mapping" class="form-label">Lama Mapping</label>
                        <input type="text" class="form-control" name="lama_mapping" id="lama_mapping" value="{{ $mapping->lama_mapping }}" autocomplete="off" spellcheck="false" required>
                    </div>
                    <div class="col-md-4">
                        <label for="topik" class="form-label">Topik</label>
                        <textarea name="topik" id="topik" rows="5" class="form-control" autocomplete="off" spellcheck="false" required>{{ $mapping->topik }}</textarea>
                    </div>
                    <div class="col-md-4">
                        <label for="hasil_mapping" class="form-label">Hasil Mapping</label>
                        <textarea name="hasil_mapping" id="hasil_mapping" rows="5" class="form-control" autocomplete="off" spellcheck="false" required>{{ $mapping->hasil_mapping }}</textarea>
                    </div>
                    <div class="col-md-4">
                        <label for="kesimpulan" class="form-label">Kesimpulan</label>
                        <textarea name="kesimpulan" id="kesimpulan" rows="5" class="form-control" autocomplete="off" spellcheck="false" required>{{ $mapping->kesimpulan }}</textarea>
                    </div>
                    <div class="col-12">
                      <button type="submit" class="btn btn-primary" id="save-data">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
