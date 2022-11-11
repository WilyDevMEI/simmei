@extends('layouts.dashboard')
@section('container')
    <div class="container-fluid px-4">
        <h4 class="mt-4 fw-bold">Data Edit Presentasi Konsumen</h4>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('presentasi.index') }}">Menu Presentasi</a></li>
            <li class="breadcrumb-item active">Edit Data</li>
        </ol>

        <div class="card">
            <div class="card-header">
                Data Edit Presentasi Konsumen
            </div>
            <div class="card-body">
                <form class="row g-3 needs-validation" method="POST" action="{{ route('presentasi.update', $presentasi->id) }}" novalidate>
                    @method('PUT')
                    @csrf
                    <div class="col-md-3">
                        <label for="tanggal_presentasi" class="form-label">Tanggal Presentasi</label>
                        <input type="date" class="form-control" name="tanggal_presentasi" id="tanggal_presentasi" value="{{ $presentasi->tanggal_presentasi->format('Y-m-d') }}" required>
                    </div>
                    <div class="col-md-5">
                        <label for="konsumen_id" class="form-label">Nama Perusahaan Konsumen</label>
                        <select name="konsumen_id" id="konsumen_id" class="form-select" required>
                            @forelse ($konsumens as $konsumen)
                            <option value="{{ $konsumen->id }}" {{ $presentasi->konsumen_id === $konsumen->id ? "selected" : "" }}>{{ $konsumen->nama_perusahaan }}</option>
                            @empty
                            <option disabled>Data masih kosong</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="wilayah" class="form-label">Wilayah</label>
                        <select name="wilayah" id="wilayah" class="form-select" required>
                            <option value="Pekanbaru" {{ $presentasi->wilayah === "Pekanbaru" ? "selected" : "" }}>Pekanbaru</option>
                            <option value="Medan" {{ $presentasi->wilayah === "Medan" ? "selected" : "" }}>Medan</option>
                            <option value="Pontianak" {{ $presentasi->wilayah === "Pontianak" ? "selected" : "" }}>Pontianak</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="pic" class="form-label">P I C</label>
                        <input type="text" class="form-control" name="pic" id="pic" value="{{ $presentasi->pic }}" autocomplete="off" spellcheck="false" required>
                    </div>
                    <div class="col-md-6">
                        <label for="target_presentasi" class="form-label">Target Presentasi</label>
                        <input type="text" class="form-control" name="target_presentasi" id="target_presentasi" value="{{ $presentasi->target_presentasi }}" autocomplete="off" spellcheck="false" required>
                    </div>
                    <div class="col-md-6">
                        <label for="peserta" class="form-label">Peserta</label>
                        <textarea name="peserta" id="peserta" class="form-control" rows="4" required>{{ $presentasi->peserta }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" rows="4" class="form-control" required>{{ $presentasi->keterangan }}</textarea>
                    </div>
                    <div class="col-12">
                      <button type="submit" class="btn btn-primary" id="save-data">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
