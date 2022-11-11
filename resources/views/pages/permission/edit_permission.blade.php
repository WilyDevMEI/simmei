@extends('layouts.dashboard')
@section('container')
    <div class="container-fluid px-4">
        <h4 class="mt-4 fw-bold">Permission</h4>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('permission.index') }}">Menu User</a></li>
            <li class="breadcrumb-item active">Menu Edit</li>
        </ol>

        <div class="card">
            <div class="card-header">Data Permission</div>
            <div class="card-body">
                <form action="{{ route('permission.update', $permission->id) }}" method="post" class="row needs-validation"
                    novalidate>
                    @method('PUT')
                    @csrf
                    <div class="col-md-5 mb-2">
                        <label for="name" class="form-label">Name Permission</label>
                        <input type="text" class="form-control" name="name" id="name" autocomplete="off"
                            value="{{ $permission->name }}" spellcheck="false" required>
                        <div class="form-text">Isi <strong>Izin Aktifitas</strong> user.</div>
                    </div>
                    <div class="my-3">
                        <button type="submit" class="btn btn-primary">Save Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
