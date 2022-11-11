@extends('layouts.dashboard')
@section('container')
    <div class="container-fluid px-4">
        <h4 class="mt-4 fw-bold">Data Relationship Konsumen</h4>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Relationship</li>
        </ol>

        @can('create relationship')
            <div class="card">
                <div class="card-header">
                    Tambah Relationship Konsumen
                </div>
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Selamat 👍</strong> {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger my-2">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif

                    <form class="row g-3 needs-validation" method="POST" action="{{ route('relationship.store') }}" novalidate
                        enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-4">
                            <label for="nomor_po" class="form-label">Nomor PO</label>
                            <input type="text" class="form-control" name="nomor_po" id="nomor_po" autocomplete="off"
                                spellcheck="false" required>
                        </div>
                        <div class="col-md-8">
                            <label for="konsumen_id" class="form-label">Nama Perusahaan</label>
                            <select name="konsumen_id" id="konsumen_id" class="form-select" required>
                                <option value="" selected disabled>Pilih konsumen...</option>
                                @forelse ($konsumens as $konsumen)
                                    <option value="{{ $konsumen->id }}">{{ $konsumen->nama_perusahaan }}</option>
                                @empty
                                    <option value="" selected disabled>Data masih kosong</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="mulai_kontrak" class="form-label">Mulai Kontrak</label>
                            <input type="date" class="form-control" name="mulai_kontrak" id="mulai_kontrak" required>
                        </div>
                        <div class="col-md-4">
                            <label for="selesai_kontrak" class="form-label">Selesai Kontrak</label>
                            <input type="date" class="form-control" name="selesai_kontrak" id="selesai_kontrak" required>
                        </div>
                        <div class="col-md-4">
                            <label for="lama_kerjasama" class="form-label">Lama Kerjasama</label>
                            <input type="text" class="form-control" name="lama_kerjasama" id="lama_kerjasama" required>
                        </div>
                        <div class="col-md-3">
                            <label for="sistem_pembayaran" class="form-label">Sistem Pembayaran</label>
                            <input type="text" class="form-control" name="sistem_pembayaran" id="sistem_pembayaran"
                                autocomplete="off" spellcheck="false" required>
                        </div>
                        <div class="col-md-5">
                            <label for="keterangan" class="form-label">Keterangan Kontrak</label>
                            <input type="text" class="form-control" name="keterangan" id="keterangan" autocomplete="off"
                                spellcheck="false" required>
                        </div>
                        <div class="col-md-4">
                            <label for="file_po" class="form-label">File PO</label>
                            <input type="file" class="form-control" name="file_po" id="file_po">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary" id="save-data">Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        @endcan

        @can('read relationship')
            <div class="card mb-4 mt-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Relationship Konsumen
                </div>
                <div class="card-body">
                    <table id="datatables" class="table table-sm table-bordered" style="width: 100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="text-nowrap">Nomor PO</th>
                                <th>Nama Perusahaan</th>
                                <th>Mulai Kontrak</th>
                                <th>Selesai Kontrak</th>
                                <th>Lama Kerjasama</th>
                                <th>Sistem Pembayaran</th>
                                <th>File PO</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($relationships as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nomor_po }}</td>
                                    <td>{{ $item->konsumen->nama_perusahaan }}</td>
                                    <td>{{ $item->mulai_kontrak->format('d-m-Y') }}</td>
                                    <td>{{ $item->selesai_kontrak->format('d-m-Y') }}</td>
                                    <td>{{ $item->lama_kerjasama }}</td>
                                    <td>{{ $item->sistem_pembayaran }}</td>
                                    <td>
                                        <a href="{{ route('open', $item->id) }}" class="btn btn-success px-2 py-1"
                                            style="font-size: 12px">
                                            <i class="fa-solid fa-eye"></i>
                                            Lihat
                                        </a>
                                    </td>
                                    <td>
                                        @can('edit relationship')
                                            <a href="{{ route('relationship.edit', $item->id) }}"
                                                class="btn btn-primary px-2 py-0">
                                                <box-icon type='solid' name='edit' size='xs' color='white'>
                                                </box-icon>
                                            </a>
                                        @endcan

                                        @can('delete relationship')
                                            <form action="{{ route('relationship.destroy', $item->id) }}" method="POST"
                                                class="d-inline-block">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger px-2 py-0 btn-delete">
                                                    <box-icon name='trash-alt' size='xs' color='white'></box-icon>
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @endif
        </div>
    @endsection
