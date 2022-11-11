@extends('layouts.dashboard')
@section('container')
    <div class="container-fluid px-4">
        <h4 class="mt-4 fw-bold">Data Mapping</h4>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Mapping</li>
        </ol>

        @can('create mapping')
            <div class="card">
                <div class="card-header">
                    Tambah Mapping Konsumen
                </div>
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Selamat 👍</strong> {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form class="row g-3 needs-validation" method="POST" action="{{ route('mapping.store') }}" novalidate>
                        @csrf
                        <div class="col-md-3">
                            <label for="tanggal_mapping" class="form-label">Tanggal Mapping</label>
                            <input type="date" class="form-control" name="tanggal_mapping" id="tanggal_mapping" required>
                        </div>
                        <div class="col-md-5">
                            <label for="konsumen_id" class="form-label">Nama Perusahaan Konsumen</label>
                            <select name="konsumen_id" id="konsumen_id" class="form-select" required>
                                <option value="" selected disabled>Pilih konsumen...</option>
                                @forelse ($konsumens as $konsumen)
                                    <option value="{{ $konsumen->id }}">{{ $konsumen->nama_perusahaan }}</option>
                                @empty
                                    <option disabled>Data masih kosong</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="wilayah" class="form-label">Wilayah</label>
                            <select name="wilayah" id="wilayah" class="form-select" required>
                                <option value="" selected disabled>Pilih wilayah...</option>
                                <option value="Pekanbaru">Pekanbaru</option>
                                <option value="Medan">Medan</option>
                                <option value="Pontianak">Pontianak</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="jarak_tempuh" class="form-label">Jarak Tempuh</label>
                            <input type="text" class="form-control" name="jarak_tempuh" id="jarak_tempuh" autocomplete="off"
                                spellcheck="false" required>
                        </div>
                        <div class="col-md-5">
                            <label for="jumlah_peserta" class="form-label">Jumlah Peserta</label>
                            <input type="text" class="form-control" name="jumlah_peserta" id="jumlah_peserta"
                                autocomplete="off" spellcheck="false" required>
                        </div>
                        <div class="col-md-5">
                            <label for="lama_mapping" class="form-label">Lama Mapping</label>
                            <input type="text" class="form-control" name="lama_mapping" id="lama_mapping" autocomplete="off"
                                spellcheck="false" required>
                        </div>
                        <div class="col-md-4">
                            <label for="topik" class="form-label">Topik</label>
                            <textarea name="topik" id="topik" rows="5" class="form-control" autocomplete="off" spellcheck="false"
                                required></textarea>
                        </div>
                        <div class="col-md-4">
                            <label for="hasil_mapping" class="form-label">Hasil Mapping</label>
                            <textarea name="hasil_mapping" id="hasil_mapping" rows="5" class="form-control" autocomplete="off"
                                spellcheck="false" required></textarea>
                        </div>
                        <div class="col-md-4">
                            <label for="kesimpulan" class="form-label">Kesimpulan</label>
                            <textarea name="kesimpulan" id="kesimpulan" rows="5" class="form-control" autocomplete="off" spellcheck="false"
                                required></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary" id="save-data">Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        @endcan

        @can('read mapping')
            <div class="card mb-4 mt-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Mapping
                </div>
                <div class="card-body">
                    <table id="datatables" class="table table-sm table-bordered" style="width: 100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="text-nowrap">Tanggal Mapping</th>
                                <th>Nama Perusahaan</th>
                                <th>Wilayah</th>
                                <th>Jarak Mapping</th>
                                <th>Jumlah Peserta</th>
                                <th>Lama Mapping</th>
                                <th>Topik</th>
                                <th>Hasil Mapping</th>
                                <th>Kesimpulan</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($mappings as $mapping)
                                <tr class="align-middle">
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $mapping->tanggal_mapping->format('d-m-Y') }}</td>
                                    <td>{{ $mapping->konsumen->nama_perusahaan }}</td>
                                    <td>{{ $mapping->wilayah }}</td>
                                    <td>{{ $mapping->jarak_tempuh }}</td>
                                    <td>{{ $mapping->jumlah_peserta }}</td>
                                    <td>{{ $mapping->lama_mapping }}</td>
                                    <td>{{ $mapping->topik }}</td>
                                    <td>{{ $mapping->hasil_mapping }}</td>
                                    <td>{{ $mapping->kesimpulan }}</td>
                                    <td class="text-nowrap">
                                        @can('edit mapping')
                                            <a href="{{ route('mapping.edit', $mapping->id) }}"
                                                class="btn btn-primary px-2 py-0">
                                                <box-icon type='solid' name='edit' size='xs' color='white'>
                                                </box-icon>
                                            </a>
                                        @endcan
                                        @can('delete mapping')
                                            <form action="{{ route('mapping.destroy', $mapping->id) }}" method="POST"
                                                class="d-inline-block">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger px-2 py-0 btn-delete">
                                                    <box-icon name='trash-alt' size='xs' color='white'></box-icon>
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="11">
                                        <div class="alert alert-info m-2 text-center">
                                            Data masih kosong.
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
