@extends('layouts.dashboard')
@section('container')
    <div class="container-fluid px-4">
        <h4 class="mt-4 fw-bold">Roles</h4>
        <ol class="breadcrumb mb-4">
            {{-- <li class="breadcrumb-item"><a href="{{ route('introduction.index') }}">Menu User</a></li> --}}
            <li class="breadcrumb-item active">Menu Roles</li>
        </ol>

        <div class="card">
            <div class="card-header">Data Roles</div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Selamat 👍</strong> {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form action="{{ route('role.store') }}" method="post" class="row needs-validation" novalidate>
                    @csrf
                    <div class="col-md-5 mb-2">
                        <label for="name" class="form-label">Name Role</label>
                        <input type="text" class="form-control" name="name" id="name" autocomplete="off"
                            spellcheck="false" required>
                        <div class="form-text">Keterangan akses pengguna.</div>
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
                            <th>Permission</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($roles as $role)
                            @if ($role->name === 'super_admin')
                                @continue
                            @endif
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->guard_name }}</td>
                                <td>
                                    <a href="{{ route('role.show', $role->id) }}" class="btn btn-success btn-sm">Open</a>
                                </td>
                                <td>
                                    <a href="{{ route('role.edit', $role->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('role.destroy', $role->id) }}" method="POST"
                                        class="d-inline-block">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm btn-delete">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <div class="alert alert-info m-1">Data Role masih kosong.</div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
