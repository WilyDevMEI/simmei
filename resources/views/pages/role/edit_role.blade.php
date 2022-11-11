@extends('layouts.dashboard')
@section('container')
    <div class="container-fluid px-4">
        <h4 class="mt-4 fw-bold">Roles</h4>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('role.index') }}">Menu Role</a></li>
            <li class="breadcrumb-item active">Menu Edit Roles</li>
        </ol>

        <div class="card">
            <div class="card-header">Data Roles</div>
            <div class="card-body">
                <form action="{{ route('role.update', $role->id) }}" method="post" class="row needs-validation" novalidate>
                    @method('PUT')
                    @csrf
                    <div class="col-md-5 mb-2">
                        <label for="role" class="form-label">Name Role</label>
                        <input type="text" value="{{ $role->name }}" name="role" id="role" class="form-control"
                            required autocomplete="off" spellcheck="false">
                    </div>
                    <div class="my-3">
                        <button type="submit" class="btn btn-primary">Save Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
