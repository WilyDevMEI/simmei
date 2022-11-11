@extends('layouts.dashboard')
@section('container')
    <div class="container-fluid px-4">
        <h4 class="mt-4 fw-bold">Detail Introduction</h4>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('introduction.index') }}">Menu Introduction</a></li>
            <li class="breadcrumb-item active">Menu Detail</li>
        </ol>

        <div class="card">
            <div class="card-header">Data Introduction</div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Tanggal Input</label>
                        <input class="form-control" disabled readonly value="{{ $introduction->tanggal_input->format('d F Y') }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Nama Konsumen</label>
                        <input type="text" class="form-control" disabled readonly value="{{ $introduction->konsumen->nama_perusahaan }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Wilayah</label>
                        <input class="form-control" disabled readonly value="{{ $introduction->wilayah }}">
                    </div>
                    <div class="col-md-7">
                        <label class="form-label">Keterangan Introduction</label>
                        <textarea class="form-control" rows="7" disabled readonly>{{ $introduction->keterangan }}</textarea>
                    </div>
                    <div class="col-md-5">
                        <label class="form-label fw-bold">Progress Aktifitas</label>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    @if ($introduction->mapping === 'on')
                                        <div class="d-flex">
                                            <ion-icon name="checkmark-circle" class="text-success me-1" style="font-size: 26px"></ion-icon> Sudah Mapping
                                        </div>
                                    @else
                                        <div class="d-flex">
                                            <ion-icon name="close-circle" class="text-danger me-1" style="font-size: 26px"></ion-icon> Belum Mapping
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-2">
                                    @if ($introduction->penetrasi === 'on')
                                        <div class="d-flex">
                                            <ion-icon name="checkmark-circle" class="text-success me-1" style="font-size: 26px"></ion-icon> Sudah Penetrasi
                                        </div>
                                    @else
                                        <div class="d-flex">
                                            <ion-icon name="close-circle" class="text-danger me-1" style="font-size: 26px"></ion-icon> Belum Penetrasi
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-2">
                                    @if ($introduction->plantest === 'on')
                                        <div class="d-flex">
                                            <ion-icon name="checkmark-circle" class="text-success me-1" style="font-size: 26px"></ion-icon> Sudah Plan Test
                                        </div>
                                    @else
                                        <div class="d-flex">
                                            <ion-icon name="close-circle" class="text-danger me-1" style="font-size: 26px"></ion-icon> Belum Plan Test
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-2">
                                    @if ($introduction->quatation === 'on')
                                        <div class="d-flex">
                                            <ion-icon name="checkmark-circle" class="text-success me-1" style="font-size: 26px"></ion-icon> Sudah Quatation
                                        </div>
                                    @else
                                        <div class="d-flex">
                                            <ion-icon name="close-circle" class="text-danger me-1" style="font-size: 26px"></ion-icon> Belum Quatation
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-2">
                                    @if ($introduction->deals === 'on')
                                        <div class="d-flex">
                                            <ion-icon name="checkmark-circle" class="text-success me-1" style="font-size: 26px"></ion-icon> Sudah Deals
                                        </div>
                                    @else
                                        <div class="d-flex">
                                            <ion-icon name="close-circle" class="text-danger me-1" style="font-size: 26px"></ion-icon> Belum Deals
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    @if ($introduction->supply === 'on')
                                        <div class="d-flex">
                                            <ion-icon name="checkmark-circle" class="text-success me-1" style="font-size: 26px"></ion-icon> Sudah Supply
                                        </div>
                                    @else
                                        <div class="d-flex">
                                            <ion-icon name="close-circle" class="text-danger me-1" style="font-size: 26px"></ion-icon> Belum Supply
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-2">
                                    @if ($introduction->kunjungan === 'on')
                                        <div class="d-flex">
                                            <ion-icon name="checkmark-circle" class="text-success me-1" style="font-size: 26px"></ion-icon> Sudah Kunjungan
                                        </div>
                                    @else
                                        <div class="d-flex">
                                            <ion-icon name="close-circle" class="text-danger me-1" style="font-size: 26px"></ion-icon> Belum Kunjungan
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
