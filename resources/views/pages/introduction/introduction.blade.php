@extends('layouts.dashboard')
@section('container')
    <div class="container-fluid px-4">
        <h4 class="mt-4 fw-bold">Data Introduction</h4>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Menu Introduction</li>
        </ol>

        @can('create introduction')
            <div class="card">
                <div class="card-header">
                    Data Introduction Konsumen Baru
                </div>
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Selamat 👍</strong> {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form class="row g-3 needs-validation" method="POST" action="{{ route('introduction.store') }}" novalidate>
                        @csrf
                        <div class="col-md-3">
                            <label for="tanggal_input" class="form-label">Tanggal Input Intro.</label>
                            <input type="date" class="form-control" name="tanggal_input" id="tanggal_input" required>
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
                        <div class="col">
                            <div class="mb-2">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="mapping"
                                        name="mapping">
                                    <label class="form-check-label" for="mapping">Sudah Mapping</label>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="penetrasi"
                                        name="penetrasi">
                                    <label class="form-check-label" for="penetrasi">Sudah Penetrasi</label>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="plantest"
                                        name="plantest">
                                    <label class="form-check-label" for="plantest">Sudah Plan Test</label>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="nego"
                                        name="quatation">
                                    <label class="form-check-label" for="nego">Sudah Quatation</label>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="deals"
                                        name="deals">
                                    <label class="form-check-label" for="deals">Sudah Deals</label>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="supply"
                                        name="supply">
                                    <label class="form-check-label" for="supply">Sudah Supply</label>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="kunjungan"
                                        name="kunjungan">
                                    <label class="form-check-label" for="kunjungan">Sudah Kunjungan/Komunikasi</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <label for="keterangan" class="form-label">Keterangan Introduction</label>
                            <textarea class="form-control" name="keterangan" id="keterangan" rows="7" required></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary" id="save-data">Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        @endcan

        @can('read introduction')
            <div class="card mb-4 mt-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Konsumen
                </div>
                <div class="card-body">
                    <table id="datatables" class="table table-sm table-bordered text-md-center align-middle"
                        style="width: 100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal Input</th>
                                <th>Nama Konsumen</th>
                                <th>Mapping</th>
                                <th>Penetrasi</th>
                                <th>Plan Test</th>
                                <th>Quatation</th>
                                <th>Deals</th>
                                <th>Supply</th>
                                <th>Kunjungan</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($introductions as $introduction)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $introduction->tanggal_input->format('d-m-Y') }}</td>
                                    <td>{{ $introduction->konsumen->nama_perusahaan }}</td>
                                    <td>
                                        @if ($introduction->mapping === 'on')
                                            <ion-icon name="checkmark-circle" class="text-success" style="font-size: 26px">
                                            </ion-icon>
                                        @else
                                            <ion-icon name="close-circle" class="text-danger" style="font-size: 26px">
                                            </ion-icon>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($introduction->penetrasi === 'on')
                                            <ion-icon name="checkmark-circle" class="text-success" style="font-size: 26px">
                                            </ion-icon>
                                        @else
                                            <ion-icon name="close-circle" class="text-danger" style="font-size: 26px">
                                            </ion-icon>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($introduction->plantest === 'on')
                                            <ion-icon name="checkmark-circle" class="text-success" style="font-size: 26px">
                                            </ion-icon>
                                        @else
                                            <ion-icon name="close-circle" class="text-danger" style="font-size: 26px">
                                            </ion-icon>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($introduction->quatation === 'on')
                                            <ion-icon name="checkmark-circle" class="text-success" style="font-size: 26px">
                                            </ion-icon>
                                        @else
                                            <ion-icon name="close-circle" class="text-danger" style="font-size: 26px">
                                            </ion-icon>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($introduction->deals === 'on')
                                            <ion-icon name="checkmark-circle" class="text-success" style="font-size: 26px">
                                            </ion-icon>
                                        @else
                                            <ion-icon name="close-circle" class="text-danger" style="font-size: 26px">
                                            </ion-icon>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($introduction->supply === 'on')
                                            <ion-icon name="checkmark-circle" class="text-success" style="font-size: 26px">
                                            </ion-icon>
                                        @else
                                            <ion-icon name="close-circle" class="text-danger" style="font-size: 26px">
                                            </ion-icon>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($introduction->kunjungan === 'on')
                                            <ion-icon name="checkmark-circle" class="text-success" style="font-size: 26px">
                                            </ion-icon>
                                        @else
                                            <ion-icon name="close-circle" class="text-danger" style="font-size: 26px">
                                            </ion-icon>
                                        @endif
                                    </td>
                                    <td>
                                        @role('admin|super_admin')
                                            <a href="{{ route('introduction.show', $introduction->id) }}" type="button"
                                                class="btn btn-info btn-sm text-white"><i
                                                    class="fa-solid fa-circle-info me-1"></i>Detail</a>
                                            <a href="{{ route('introduction.edit', $introduction->id) }}" type="button"
                                                class="btn btn-warning btn-sm"><i
                                                    class="fa-solid fa-pen-to-square me-1"></i>Edit</a>
                                            <form action="{{ route('introduction.destroy', $introduction->id) }}" method="post"
                                                class="d-inline-block">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-delete btn-sm"><i
                                                        class="fa-solid fa-trash me-1"></i>Delete</button>
                                            </form>
                                        @endrole
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endcan
    </div>
@endsection
