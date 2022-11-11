@extends('layouts.dashboard')
@section('container')
    <div class="container-fluid px-4">
        <h4 class="mt-4 fw-bold">Data User</h4>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Menu User</a></li>
            <li class="breadcrumb-item active">Detail Pengguna</li>
        </ol>

        <div class="card">
            <div class="card-header">Detail Pengguna</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5 mb-2">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control" value="{{ $user->name }}" readonly disabled>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label class="form-label">Position</label>
                        <input type="text" class="form-control" value="{{ $user->position }}" readonly disabled>
                    </div>
                    <div class="col-md-3 mb-2">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" value="{{ $user->phone }}" readonly disabled>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" value="{{ $user->username }}" disabled readonly>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" class="form-control" value="{{ $user->password }}" readonly disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
