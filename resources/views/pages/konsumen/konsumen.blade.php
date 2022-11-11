@extends('layouts.dashboard')
@section('container')
    <div class="container-fluid px-4">
        <h4 class="mt-4 fw-bold">Data Konsumen</h4>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Konsumen</li>
        </ol>

        @can('create konsumen')
            <div class="card">
                <div class="card-header">
                    Data Konsumen Baru
                </div>
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Selamat 👍</strong> {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form class="row g-3 needs-validation" method="POST" action="{{ route('konsumen.store') }}" novalidate>
                        @csrf
                        <div class="col-md-6">
                            <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                            <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan"
                                autocomplete="off" spellcheck="false" required>
                        </div>
                        <div class="col-md-6">
                            <label for="bidang_perusahaan" class="form-label">Bidang Perusahaan</label>
                            <input type="text" class="form-control" id="bidang_perusahaan" name="bidang_perusahaan"
                                autocomplete="off" spellcheck="false" required>
                        </div>
                        <div class="col-md-7">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" autocomplete="off"
                                spellcheck="false" required>
                        </div>
                        <div class="col-md-5">
                            <label for="wilayah" class="form-label">Wilayah</label>
                            <input type="text" class="form-control" id="wilayah" name="wilayah" autocomplete="off"
                                spellcheck="false" required>
                        </div>
                        <div class="col-md-5">
                            <label for="pic" class="form-label">PIC</label>
                            <input type="text" class="form-control" id="pic" name="pic" autocomplete="off"
                                spellcheck="false" required>
                        </div>
                        <div class="col-md-4">
                            <label for="pkp" class="form-label">PKP</label>
                            <select name="pkp" id="pkp" class="form-select" required>
                                <option value="" selected disabled>Pilih...</option>
                                <option value="Kompensasi">Kompensasi</option>
                                <option value="Non-PKP">Non-PKP</option>
                                <option value="PKP">PKP</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="npwp" class="form-label">NPWP</label>
                            <input type="text" class="form-control" id="npwp" name="npwp" autocomplete="off"
                                spellcheck="false" required>
                        </div>
                        <div class="col-md-6">
                            <label for="no_akta" class="form-label">Nomor Akta</label>
                            <input type="text" class="form-control" id="no_akta" name="no_akta" autocomplete="off"
                                spellcheck="false" required>
                            <div class="form-text">Opsional</div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="kategori" class="form-label">SPAM / PKS</label>
                            <input type="text" class="form-control" id="kategori" name="kategori" autocomplete="off"
                                spellcheck="false" required>
                            <div class="form-text">Opsional</div>
                        </div>
                        <div class="col-12">
                            <label for="deskripsi" class="form-label">Deskripsi Perusahaan</label>
                            <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control" required></textarea>
                            <div class="form-text">Isikan deskripsi atau sejarah perusahaan</div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary" id="save-data">Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        @endcan

        @can('read konsumen')
            <div class="card mb-4 mt-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Konsumen
                </div>
                <div class="card-body">
                    <table id="datatables" class="table table-sm table-bordered" style="width: 100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Bidang Perusahaan</th>
                                <th>NPWP</th>
                                <th>No Akta</th>
                                <th>PKP</th>
                                <th>Wilayah</th>
                                <th>SPAM/PKS</th>
                                <th>Deskripsi</th>
                                <th>PIC</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($konsumens as $konsumen)
                                <tr>
                                    <th class="align-middle">{{ $loop->iteration }}</th>
                                    <td class="align-middle">{{ $konsumen->nama_perusahaan }}</td>
                                    <td class="align-middle">{{ $konsumen->bidang_perusahaan }}</td>
                                    <td class="align-middle">{{ $konsumen->npwp }}</td>
                                    <td class="align-middle">{{ $konsumen->no_akta }}</td>
                                    <td class="align-middle">{{ $konsumen->pkp }}</td>
                                    <td class="align-middle">{{ $konsumen->wilayah }}</td>
                                    <td class="align-middle">{{ $konsumen->kategori }}</td>
                                    <td class="align-middle">{{ $konsumen->deskripsi }}</td>
                                    <td class="align-middle">{{ $konsumen->pic }}</td>
                                    <td class="align-middle text-center">
                                        @can('edit konsumen')
                                            <a href="{{ route('konsumen.edit', Hashids::encode($konsumen->id)) }}"
                                                class="btn btn-primary px-2 py-0">
                                                <box-icon type='solid' name='edit' size='xs' color='white'>
                                                </box-icon>
                                            </a>
                                        @endcan
                                        @can('delete konsumen')
                                            <form action="{{ route('konsumen.destroy', $konsumen->id) }}" method="POST"
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
                                <tr>
                                    <td colspan="11">
                                        <div class="alert alert-info m-0 text-center">
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
