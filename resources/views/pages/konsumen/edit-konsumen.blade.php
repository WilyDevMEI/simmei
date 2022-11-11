@extends('layouts.dashboard')
@section('container')
    <div class="container-fluid px-4">
        <h4 class="mt-4 fw-bold">Edit data Konsumen</h4>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('konsumen.index') }}">Konsumen</a></li>
            <li class="breadcrumb-item active">Edit data</li>
        </ol>

        <div class="card">
            <div class="card-header">
                Data Konsumen
            </div>
            <div class="card-body">
                <form class="row g-3 needs-validation" method="POST" action="{{ route('konsumen.update', $konsumen->id) }}"
                    novalidate>
                    @method('PUT')
                    @csrf
                    <div class="col-md-6">
                        <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                        <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan"
                            value="{{ $konsumen->nama_perusahaan }}" autocomplete="off" spellcheck="false" required>
                    </div>
                    <div class="col-md-6">
                        <label for="bidang_perusahaan" class="form-label">Bidang Perusahaan</label>
                        <input type="text" class="form-control" id="bidang_perusahaan" name="bidang_perusahaan"
                            value="{{ $konsumen->bidang_perusahaan }}" autocomplete="off" spellcheck="false" required>
                    </div>
                    <div class="col-md-7">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat"
                            value="{{ $konsumen->alamat }}" autocomplete="off" spellcheck="false" required>
                    </div>
                    <div class="col-md-5">
                        <label for="wilayah" class="form-label">Wilayah</label>
                        <input type="text" class="form-control" id="wilayah" name="wilayah"
                            value="{{ $konsumen->wilayah }}" autocomplete="off" spellcheck="false" required>
                    </div>
                    <div class="col-md-5">
                        <label for="pic" class="form-label">PIC</label>
                        <input type="text" class="form-control" id="pic" name="pic"
                            value="{{ $konsumen->pic }}" autocomplete="off" spellcheck="false" required>
                    </div>
                    <div class="col-md-4">
                        <label for="pkp" class="form-label">PKP</label>
                        <select name="pkp" id="pkp" class="form-select" required>
                            <option value="Kompensasi" {{ $konsumen->pkp === 'Kompensasi' ? 'selected' : '' }}>Kompensasi
                            </option>
                            <option value="Non-PKP" {{ $konsumen->pkp === 'Non-PKP' ? 'selected' : '' }}>Non-PKP</option>
                            <option value="PKP" {{ $konsumen->pkp === 'PKP' ? 'selected' : '' }}>PKP</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="npwp" class="form-label">NPWP</label>
                        <input type="text" class="form-control" id="npwp" name="npwp"
                            value="{{ $konsumen->npwp }}" autocomplete="off" spellcheck="false" required>
                    </div>
                    <div class="col-md-6">
                        <label for="no_akta" class="form-label">Nomor Akta</label>
                        <input type="text" class="form-control" id="no_akta" name="no_akta"
                            value="{{ $konsumen->no_akta }}" autocomplete="off" spellcheck="false" required>
                        <div class="form-text">Opsional</div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="kategori" class="form-label">SPAM / PKS</label>
                        <input type="text" class="form-control" id="kategori" name="kategori"
                            value="{{ $konsumen->kategori }}" autocomplete="off" spellcheck="false" required>
                        <div class="form-text">Opsional</div>
                    </div>
                    <div class="col-12">
                        <label for="deskripsi" class="form-label">Deskripsi Perusahaan</label>
                        <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control" required>{{ $konsumen->deskripsi }}</textarea>
                        <div class="form-text">Isikan deskripsi atau sejarah perusahaan</div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Perbaharui Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
