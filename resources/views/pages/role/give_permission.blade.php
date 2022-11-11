@extends('layouts.dashboard')
@section('container')
    <div class="container-fluid px-4">
        <h4 class="mt-4 fw-bold">Roles</h4>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('role.index') }}">Menu Role</a></li>
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
                @elseif ($message = Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Gagal ❌</strong> {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-5 mb-2">
                        <label for="name" class="form-label">Name Role</label>
                        <input type="text" class="form-control" value="{{ $role->name }}" readonly disabled>
                    </div>
                </div>
                <form action="{{ route('role.permission', $role->id) }}" method="post" class="row needs-validation"
                    novalidate>
                    @csrf
                    <div class="col-md-5 mb-2">
                        <label for="permission" class="form-label">Name Permission</label>
                        <select class="form-select" name="permission[]" id="multiple-select-field"
                            data-placeholder="Choose anything" multiple>
                            @foreach ($permissions as $permission)
                                <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="my-3">
                        <button type="submit" class="btn btn-primary">Save Data</button>
                    </div>
                </form>
            </div>

        </div>

        <div class="card my-4">
            <div class="card-header">List role permission</div>
            <div class="card-body">
                <table class="table table-sm w-100" id="datatables">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name Roles</th>
                            <th>Permission</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($role->permissions)
                            @foreach ($role->permissions as $role_permission)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $role_permission->name }}</td>
                                    <td>{{ $role_permission->guard_name }}</td>
                                    <td>
                                        <form action="{{ route('revoke.permission', [$role->id, $role_permission->id]) }}"
                                            method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger btn-sm btn-revoke-permission"
                                                type="submit">Delete</button>
                                        </form>
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

@push('multiple-select')
    <script>
        $('#multiple-select-field').select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            closeOnSelect: false,
        });
    </script>
@endpush
