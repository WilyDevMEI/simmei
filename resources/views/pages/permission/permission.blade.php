@extends('layouts.dashboard')
@section('container')
    <div class="container-fluid px-4">
        <h4 class="mt-4 fw-bold">Permission</h4>
        <ol class="breadcrumb mb-4">
            {{-- <li class="breadcrumb-item"><a href="{{ route('introduction.index') }}">Menu User</a></li> --}}
            <li class="breadcrumb-item active">Menu Permission</li>
        </ol>

        <div class="card">
            <div class="card-header">Data Permission</div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Selamat 👍</strong> {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form action="{{ route('permission.store') }}" method="post" class="row needs-validation" novalidate>
                    @csrf
                    <div class="col-md-5 mb-2">
                        <label for="name" class="form-label">Name Permission</label>
                        <input type="text" class="form-control" name="name" id="name" autocomplete="off"
                            spellcheck="false" required>
                        <div class="form-text">Isi <strong>Izin Aktifitas</strong> user.</div>
                    </div>
                    <div class="my-3">
                        <button type="submit" class="btn btn-primary">Save Data</button>
                    </div>
                </form>
            </div>

        </div>

        <div class="card my-4">
            <div class="card-header">List Permission</div>
            <div class="card-body">
                <table class="table table-sm w-100" id="datatables">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name Accessibility</th>
                            <th>Guard</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('ss_script')
    <script>
        $(document).ready(function() {
            $('#datatables').DataTable({
                processing: true,
                serverSide: true,
                destroy: true,
                ajax: '{!! route('permission.index') !!}',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'guard_name',
                        name: 'guard_name'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                    }
                ]
            });
        });
    </script>
@endpush
