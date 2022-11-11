@extends('layouts.dashboard')
@section('container')
    <div class="container-fluid px-4">
        <h4 class="mt-4 fw-bold">Data User</h4>
        <ol class="breadcrumb mb-4">
            {{-- <li class="breadcrumb-item"><a href="{{ route('introduction.index') }}">Menu User</a></li> --}}
            <li class="breadcrumb-item active">Menu User</li>
        </ol>

        <div class="card">
            <div class="card-header">Data User</div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Selamat 👍</strong> {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form action="{{ route('user.store') }}" method="post" class="row needs-validation" novalidate>
                    @csrf
                    <div class="col-md-5 mb-2">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="name" id="name" autocomplete="off"
                            spellcheck="false" required>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="position" class="form-label">Position</label>
                        <input type="text" class="form-control" name="position" id="position" autocomplete="off"
                            spellcheck="false" required>
                    </div>
                    <div class="col-md-3 mb-2">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" name="phone" id="phone" class="form-control" autocomplete="off"
                            spellcheck="false" required>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-control" autocomplete="off"
                            spellcheck="false" required>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password" autocomplete="off"
                            spellcheck="false" required>
                    </div>
                    <div class="my-3">
                        <button type="submit" class="btn btn-primary">Save Data</button>
                    </div>
                </form>
            </div>

        </div>

        <div class="card my-4">
            <div class="card-header">List User</div>
            <div class="card-body">
                <table class="table table-sm w-100" id="datatables">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama User</th>
                            <th>Position</th>
                            <th>Username</th>
                            <th>Phone</th>
                            <th>Access</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->position }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>
                                    <a href="{{ route('user.role', $user->id) }}" class="btn btn-primary btn-sm">Roles</a>
                                </td>
                                <td>
                                    <a href="{{ route('user.show', $user->id) }}" class="btn btn-info btn-sm">Open</a>
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST"
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
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
