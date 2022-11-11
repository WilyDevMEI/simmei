@extends('layouts.dashboard')
@section('container')
    <div class="container-fluid px-4">
        <h4 class="mt-4 fw-bold">Edit data relationship</h4>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('relationship.index') }}">Relationship</a></li>
            <li class="breadcrumb-item active">Edit data</li>
        </ol>


        <div class="card">
            <div class="card-header">
                Data Relationship
            </div>
            <div class="card-body">
                <form class="row g-3 needs-validation" method="POST"
                    action="{{ route('relationship.update', $relationship->id) }}" enctype="multipart/form-data" novalidate>
                    @method('PUT')
                    @csrf
                    <div class="col-md-4">
                        <label for="nomor_po" class="form-label">Nomor PO</label>
                        <input type="text" class="form-control" name="nomor_po" id="nomor_po" autocomplete="off"
                            spellcheck="false" value="{{ $relationship->nomor_po }}" required>
                    </div>
                    <div class="col-md-8">
                        <label for="konsumen_id" class="form-label">Nama Perusahaan</label>
                        <select name="konsumen_id" id="konsumen_id" class="form-select" required>
                            <option value="" selected disabled>Pilih konsumen...</option>
                            @forelse ($konsumens as $konsumen)
                                <option value="{{ $konsumen->id }}"
                                    {{ $relationship->konsumen_id == $konsumen->id ? 'selected' : '' }}>
                                    {{ $konsumen->nama_perusahaan }}</option>
                            @empty
                                <option value="" selected disabled>Data masih kosong</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="mulai_kontrak" class="form-label">Mulai Kontrak</label>
                        <input type="date" class="form-control" name="mulai_kontrak" id="mulai_kontrak"
                            value="{{ $relationship->mulai_kontrak->format('Y-m-d') }}" required>
                    </div>
                    <div class="col-md-4">
                        <label for="selesai_kontrak" class="form-label">Selesai Kontrak</label>
                        <input type="date" class="form-control" name="selesai_kontrak" id="selesai_kontrak"
                            value="{{ $relationship->selesai_kontrak->format('Y-m-d') }}" required>
                    </div>
                    <div class="col-md-4">
                        <label for="lama_kerjasama" class="form-label">Lama Kerjasama</label>
                        <input type="text" class="form-control" name="lama_kerjasama" id="lama_kerjasama"
                            value="{{ $relationship->lama_kerjasama }}" required>
                    </div>
                    <div class="col-md-3">
                        <label for="sistem_pembayaran" class="form-label">Sistem Pembayaran</label>
                        <input type="text" class="form-control" name="sistem_pembayaran" id="sistem_pembayaran"
                            autocomplete="off" spellcheck="false" value="{{ $relationship->sistem_pembayaran }}" required>
                    </div>
                    <div class="col-md-5">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" id="keterangan" autocomplete="off"
                            value="{{ $relationship->keterangan }}" spellcheck="false" required>
                    </div>
                    <div class="col-md-4">
                        {{-- jika ada foto  --}}
                        {{-- jika tidak ada foto --}}
                        <label for="file_po" class="form-label">File PO</label>
                        <input type="file" class="form-control" name="file_po" id="file_po">
                        <div class="form-text fst-italic">Kosongkan field ini jika tidak ingin memperbaharui file PO
                        </div>
                        @if ($relationship->file_po)
                            <input type="text" hidden name="oldFile" value="{{ $relationship->file_po }}">
                        @endif
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Perbaharui Data</button>
                    </div>
                </form>
            </div>
        </div>


        <div class="card my-3">
            <div class="card-header">
                File PO
            </div>
            <div class="card-body">
                @if (!$relationship->file_po || !Storage::exists($relationship->file_po))
                    <div class="alert alert-info my-2">
                        File PO kosong
                    </div>
                @else
                    <iframe src="{{ asset('storage/' . $relationship->file_po) }}" frameborder="0" width="100%"
                        height="500px"></iframe>
                @endif
            </div>
        </div>
    </div>
@endsection
