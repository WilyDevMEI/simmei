@extends('layouts.dashboard')
@section('container')
    <div class="container-fluid px-4">
        <h4 class="mt-4 fw-bold">Roles</h4>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Menu User</a></li>
            <li class="breadcrumb-item active">Menu Has Role</li>
        </ol>

        <div class="card">
            <div class="card-header">Data Roles</div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Selamat 👍</strong> {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif ($message = Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Gagal ❌</strong> {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-5 mb-2">
                        <label for="name" class="form-label">User</label>
                        <input type="text" class="form-control" value="{{ $user->name }}" disabled readonly>
                    </div>
                </div>

                <form action="{{ route('user.assign.role', $user->id) }}" method="post" class="row needs-validation"
                    novalidate>
                    @csrf
                    <div class="col-md-5 mb-2">
                        <label for="role" class="form-label">Name Role</label>
                        <select name="role" id="role" class="form-select">
                            <option disabled selected>Pilih role user...</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        <div class="form-text">Pilih Role pengguna (alias)</div>
                    </div>
                    <div class="my-3">
                        <button type="submit" class="btn btn-primary">Save Data</button>
                    </div>
                </form>
            </div>

        </div>

        <div class="card my-4">
            <div class="card-header">List Roles</div>
            <div class="card-body">
                <table class="table table-sm w-100" id="datatables">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name Roles</th>
                            <th>Guard</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($user->roles)
                            @foreach ($user->roles as $user_role)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user_role->name }}</td>
                                    <td>{{ $user_role->guard_name }}</td>
                                    <td>
                                        <button class="btn btn-warning btn-sm">Edit</button>
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
