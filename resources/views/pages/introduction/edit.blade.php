@extends('layouts.dashboard')
@section('container')
    <div class="container-fluid px-4">
        <h4 class="mt-4 fw-bold">Data Introduction</h4>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('introduction.index') }}">Menu Introduction</a></li>
            <li class="breadcrumb-item active">Menu Edit</li>
        </ol>

        <div class="card">
            <div class="card-header">
                Data Introduction Konsumen Baru
            </div>
            <div class="card-body">
                <form class="row g-3 needs-validation" method="POST" action="{{ route('introduction.update', $introduction->id) }}" novalidate>
                    @method('PUT')
                    @csrf
                    <div class="col-md-3">
                        <label for="tanggal_input" class="form-label">Tanggal Input Intro.</label>
                        <input type="date" class="form-control" name="tanggal_input" id="tanggal_input" value="{{ $introduction->tanggal_input->format('Y-m-d') }}" required>
                    </div>
                    <div class="col-md-5">
                        <label for="konsumen_id" class="form-label">Nama Perusahaan Konsumen</label>
                        <select name="konsumen_id" id="konsumen_id" class="form-select" required>
                            @forelse ($konsumens as $konsumen)
                            <option value="{{ $konsumen->id }}" {{ $konsumen->id === $introduction->konsumen_id ? "selected" : "" }}>{{ $konsumen->nama_perusahaan }}</option>
                            @empty
                            <option disabled>Data masih kosong</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="wilayah" class="form-label">Wilayah</label>
                        <select name="wilayah" id="wilayah" class="form-select" required>
                            <option value="" selected disabled>Pilih wilayah...</option>
                            <option value="Pekanbaru" {{ $introduction->wilayah === "Pekanbaru" ? "selected" : "" }}>Pekanbaru</option>
                            <option value="Medan" {{ $introduction->wilayah === "Medan" ? "selected" : "" }}>Medan</option>
                            <option value="Pontianak" {{ $introduction->wilayah === "Pontianak" ? "selected" : "" }}>Pontianak</option>
                        </select>
                    </div>
                    <div class="col">
                        <div class="mb-2">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="mapping" name="mapping" {{ $introduction->mapping === "on" ? "checked": "" }}>
                                <label class="form-check-label" for="mapping">Sudah Mapping</label>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="penetrasi" name="penetrasi" {{ $introduction->penetrasi === "on" ? "checked": "" }}>
                                <label class="form-check-label" for="penetrasi">Sudah Penetrasi</label>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="plantest" name="plantest" {{ $introduction->plantest === "on" ? "checked": "" }}>
                                <label class="form-check-label" for="plantest">Sudah Plan Test</label>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="nego" name="quatation" {{ $introduction->quatation === "on" ? "checked": "" }}>
                                <label class="form-check-label" for="nego">Sudah Quatation</label>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="deals" name="deals" {{ $introduction->deals === "on" ? "checked": "" }}>
                                <label class="form-check-label" for="deals">Sudah Deals</label>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="supply" name="supply" {{ $introduction->supply === "on" ? "checked": "" }}>
                                <label class="form-check-label" for="supply">Sudah Supply</label>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="kunjungan" name="kunjungan" {{ $introduction->kunjungan === "on" ? "checked": "" }}>
                                <label class="form-check-label" for="kunjungan">Sudah Kunjungan/Komunikasi</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <label for="keterangan" class="form-label">Keterangan Introduction</label>
                        <textarea class="form-control" name="keterangan" id="keterangan" rows="7" required>{{ $introduction->keterangan }}</textarea>
                    </div>
                    <div class="col-12">
                      <button type="submit" class="btn btn-primary" id="save-data">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
