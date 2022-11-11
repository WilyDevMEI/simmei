@extends('layouts.dashboard')
@section('container')
    <div class="container-fluid px-4">
        <h4 class="mt-4 fw-bold">Data Edit Jartest</h4>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('jartest.index') }}">Menu Jartest</a></li>
            <li class="breadcrumb-item active">Menu Edit</li>
        </ol>

        <div class="card">
            <div class="card-header">
                Data Edit Jartest Konsumen
            </div>
            <div class="card-body">
                <form class="row g-3 needs-validation" method="POST" action="{{ route('jartest.update', $jartest->id) }}" novalidate>
                    @method('PUT')
                    @csrf
                    <div class="col-md-3">
                        <label for="tanggal_jartest" class="form-label">Tanggal Jartest</label>
                        <input type="date" class="form-control" name="tanggal_jartest" id="tanggal_jartest" value="{{ $jartest->tanggal_jartest->format('Y-m-d') }}" required>
                    </div>
                    <div class="col-md-5">
                        <label for="konsumen_id" class="form-label">Nama Perusahaan Konsumen</label>
                        <select name="konsumen_id" id="konsumen_id" class="form-select" required>
                            @forelse ($konsumens as $konsumen)
                            <option value="{{ $konsumen->id }}" {{ $jartest->konsumen_id === $konsumen->id ? "selected" : "" }}>{{ $konsumen->nama_perusahaan }}</option>
                            @empty
                            <option disabled>Data masih kosong</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="wilayah" class="form-label">Wilayah</label>
                        <select name="wilayah" id="wilayah" class="form-select" required>
                            <option value="" selected disabled>Pilih wilayah...</option>
                            <option value="Pekanbaru" {{ $jartest->wilayah === "Pekanbaru" ? "selected" : "" }}>Pekanbaru</option>
                            <option value="Medan" {{ $jartest->wilayah === "Medan" ? "selected" : "" }}>Medan</option>
                            <option value="Pontianak" {{ $jartest->wilayah === "Pontianak" ? "selected" : "" }}>Pontianak</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="nama_produk" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" name="nama_produk" id="nama_produk" value="{{ $jartest->nama_produk }}" autocomplete="off" spellcheck="false" required>
                    </div>
                    <div class="col-md-2">
                        <label for="cost" class="form-label">Cost / m3</label>
                        <input type="text" class="form-control" name="cost" id="cost" value="{{ $jartest->cost }}" autocomplete="off" spellcheck="false" required>
                    </div>
                    <div class="col-md-4">
                        <label for="jenis_air" class="form-label">Jenis Air Baku</label>
                        <input type="text" class="form-control" name="jenis_air" id="jenis_air" value="{{ $jartest->jenis_air }}" autocomplete="off" spellcheck="false" required>
                    </div>
                    <div class="col-md-2">
                        <label for="dosis" class="form-label">Dosis</label>
                        <input type="text" class="form-control" name="dosis" id="dosis" value="{{ $jartest->dosis }}" autocomplete="off" spellcheck="false" required>
                    </div>
                    <div class="col-12">
                        <label for="parameter_air" class="form-label">Parameter Air</label>
                        <input type="text" class="form-control" name="parameter_air" id="parameter_air" value="{{ $jartest->parameter_air }}" autocomplete="off" spellcheck="false" required>
                    </div>
                    <div class="col-12">
                        <label for="data_teknik" class="form-label">Data Teknik</label>
                        <textarea name="data_teknik" id="data_teknik" rows="4" class="form-control" required>{{ $jartest->data_teknik }}</textarea>
                    </div>
                    <div class="col-12">
                      <button type="submit" class="btn btn-primary" id="save-data">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
